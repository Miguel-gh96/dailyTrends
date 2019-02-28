<?php
namespace App\Services;

use App\Feed;
use Goutte\Client;

class FeedService
{


  public $limit;

  /**
   * Create a new FeedService instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->limit = 5;
  }

  public function loadDefaultSourceFeeds() 
  {
    $config = array(
        'url' => 'https://elpais.com/',
        'source' => array('css_selector' => 'article h2 a','thing_to_scrape' => 'href'),
        'title' => array('css_selector' => 'article h1','thing_to_scrape' => '_text'),
        'image' => array('css_selector' => 'article figure meta'),
        'publisher' => array('css_selector' => 'article .autor','thing_to_scrape' => '_text'),
        'body' => array('css_selector' => 'article p')
    );
    $this->read_and_save($config);

    $config = array(
        'url' => 'https://www.elmundo.es/',
        'source' =>array('css_selector' => 'article h2 a','thing_to_scrape' => 'href'),
        'title' => array('css_selector' => 'article h1','thing_to_scrape' => '_text'),
        'image' => array('css_selector' => 'article figure img'),
        'publisher' => array('css_selector' => 'article .author','thing_to_scrape' => '_text'),
        'body' => array('css_selector' => 'article p')
    );
    $this->read_and_save($config);
  }

  public function read_and_save($config)
  {
    
    $client = new Client();
    $crawler = $client->request('GET',$config['url']);

    $sources = $crawler->filter($config['source']['css_selector'])->extract($config['source']['thing_to_scrape']);
      for ($i=0;$i<$this->limit;$i++) {
          $source = $sources[$i];

          $client = new Client();
          $crawler = $client->request('GET',$source);

          // title --> article h1
          $title = $crawler->filter($config['title']['css_selector'])->extract($config['title']['thing_to_scrape']);  
          if (!$title) { continue; }

          // check if already exist feed
          $feed = Feed::where('title', $title)->first();
          if ($feed) continue;
        
          // image --> article img
          $imgsrc_arr = $crawler->filter($config['image']['css_selector'])->each(function ($node) {     
              if ($node->getNode(0)->getAttribute('itemprop') == 'url') {
                  return $node->getNode(0)->getAttribute('content');                    
              }
              elseif ($node->getNode(0)->getAttribute('itemprop') == 'thumbnailUrl') {
                  return $node->getNode(0)->getAttribute('content');                    
              }                
              elseif ($node->getNode(0)->getAttribute('src')) {
                  return $node->getNode(0)->getAttribute('src');                    
              }
              return false;
          });

          foreach($imgsrc_arr as $imgsrc) {
              if ($imgsrc) {
                  $image = $imgsrc;
                  break;
              }
          }
          
          // publisher -> article .autor,article .author
          $publisher = $crawler->filter($config['publisher']['css_selector'])->extract($config['publisher']['thing_to_scrape']);

          // body  --> article p
          $body = $crawler->filter($config['body']['css_selector'])->each(function ($node) {     
              return "<p>".$node->html()."</p>";                
          });
          $body = implode('', $body); 
                  
          // save data
          try{
            $feed = new Feed;
            if (count($title)) $feed->title = trim($title[0]);
            if ($image) $feed->image = $image;
            if ($publisher) $feed->publisher = trim($publisher[0]);
            if ($body) $feed->body = $body;
            if ($source) $feed->source = $source;
            $feed->save();                  
         }
         catch(\Exception $e){
            // do task when error
            // echo $e->getMessage();   // insert query
         }          
      }

    return true;
  }

}
@extends('layouts/base')
@section('content')
<?php
// TODO: save slug on database
use Illuminate\Support\Str;
?>

<section class='home section'>
    <div class='container'>
        <div class=''>
            @foreach ($featuredFeeds as $feed)
            <div class='custom_column'>
                <div class="card">
                    <a href="{{ url('/feed/' . $feed->id . '/' . (Str::slug($feed->title))) }}" class="card-image">
                        <figure class="image is-4by3">
                            <img src="{{ $feed->image }}" alt="Placeholder image">
                        </figure>
                    </a>
                    <div class="card-content">                            
                        <div class="content">
                            <a href="{{ url('/feed/' . $feed->id . '/' . (Str::slug($feed->title))) }}" class="title is-4">{{ $feed->title }}</a>
                            @if (strpos($feed->source, "elpais"))                    
                                <p class="subtitle is-6">
                                    <a href="{{ $feed->source }}">Fuente: El País</a>
                                </p>
                            @elseif (strpos($feed->source, "elmundo"))
                                <p class="subtitle is-6"><a href="{{ $feed->source }}">Fuente: El Mundo</a></p>
                            @else
                                <p class="subtitle is-6"><a href="{{ $feed->source }}">Fuente: Otros</a></p>
                            @endif                                                                
                        </div>
                    </div>
                </div>
            </div>
            @endforeach            
        </div>
    </div>
</section>
@endsection
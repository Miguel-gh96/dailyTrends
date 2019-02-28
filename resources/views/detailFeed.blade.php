@extends('layouts/base')
@section('content')
<section class='detailFeed section'>
    <div class='container'>
        <h1>{{ $feed->title }}</h1>
        <div class="card">
            <div class="card-image">
                <figure class="image is-4by3">
                <img src="{{ $feed->image }}" alt="Placeholder image">
                </figure>
            </div>
            <div class="card-content">
                <div class="media-content">                    
                    <p class="title is-4">{{ $feed->publisher }}</p>
                </div>
                </div>
                <div class="content">
                    {!! $feed->body !!}    
                    <br>
                    <a href="{{ $feed->source }}">Fuente</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
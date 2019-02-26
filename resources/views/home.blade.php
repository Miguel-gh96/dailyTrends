@extends('layouts/base')
@section('content')
<section class='home section'>
    <div class='container'>
        <div class=''>
            @foreach ($featuredFeeds as $feed)
                <div class='custom_column'>
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-4by3">
                                <img src="{{ $feed->image }}" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">                            
                            <div class="content">
                                {{ $feed->title }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach            
        </div>
    </div>
</section>
@endsection
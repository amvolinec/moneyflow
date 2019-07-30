@extends('layouts.app')

@section('content')

    @foreach($videos AS $video)
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{!! $video->title !!}</div>
                        <div class="card-body">
                            <div class="font-weight-bold mt-2">Image:</div>
                            <div><img class="img-thumbnail" src="{{ $video->thumbnail }}"></div>
                            <div></div>
                            <div class="font-weight-bold mt-2">Description:</div>
                            <div>{!! $video->description !!}</div>
                            <div><span class="font-weight-bold">YouTube Id: </span>{{ $video->video_id }}</div>
                            <div><span class="font-weight-bold">Views: </span>{{ $video->views }}</div>
                            <div><span class="font-weight-bold">Likes: </span>{{ $video->likes }}</div>
                            <div><span class="font-weight-bold">Dislikes: </span>{{ $video->dislikes }}</div>
                            <div><span class="font-weight-bold">Favorites: </span>{{ $video->favorite }}</div>
                            <div><span class="font-weight-bold">Comments: </span>{{ $video->comment }}</div>
                            <div><span class="font-weight-bold">Channel Title: </span>{{ $video->channel_title }}</div>
                            <div><span class="font-weight-bold">Category: </span>{{ $video->category }}</div>
                            <div><span class="font-weight-bold">Published: </span>{{ $video->published_at }}</div>
                            <div><span class="font-weight-bold">Channel Id: </span>{{ $video->channel_id }}</div>
                            <div><span class="font-weight-bold">Tags: </span>
                                @if(!empty($video->tags))
                                    @foreach(json_decode($video->tags, true) AS $tag)
                                        {{ $tag }} |
                                    @endforeach
                                @endif
                            </div>
                            <div><span class="font-weight-bold">Link to YouTube: </span><a
                                        class="btn btn-sm btn-outline-secondary"
                                        href="https://youtu.be/{{ $video->video_id }}"
                                        target="_blank"> YouTube </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
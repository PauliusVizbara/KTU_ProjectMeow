@extends('layouts.app')

@section('content')

    <div class="container single-view">

        @if (Auth::user()->role_id < 2)
            <div class="actions">
                <span>Views: {{$animal->viewCount}}</span>
                <form action="{{ route('animals.destroy', $animal->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
            <hr style="border-top: 1px solid white;">

        @endif

        <div class="animal-view">
            <div class="animal-view__image">
                <img class="watermark" src="{{asset('storage/logo.png')}}"/>
                <img class="photo" src="{{asset('storage/'.$animal->photo)}}"/>
            </div>
            <div class="animal-view__info">
                <h2>{{$animal->status->name}}</h2>
                <br>
                <h3>{{$animal->species->name}}, {{$animal->gender->name}}</h3>
                <h4>Age: {{$animal->age}}</h4>
                <h4>Location: {{$animal->location}}</h4>
                <h4>Author: {{$animal->user->name}}</h4>
                @if ($animal->expires_in != null)
                    <h4>Expires in: {{$animal->expires_in}}</h4>
                @endif
            </div>
        </div>

        <hr style="color: white;">
        <h1 style="padding-top:20px;border-top: 1px solid white">Comments</h1>
        @foreach ($animal->comments as $comment)
            @if( $comment->author != null)
            <span style="display: block;">{{$comment->author->name}}</span>
            <span style="margin-top: -5px;font-size: 10px;display: block;"
            ><i>{{$comment->created_at}}</i></span>
            <p style="font-size:16px;">{{$comment->text}}</p>
            <br>
                @endif
        @endforeach
        @include('comments.new', ['animal' => $animal])
    </div>


@endsection

@extends('layouts.app')

@section('title','Posts')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            @include('partials.leftmenu')
        </div>
        <div class="col-md-10">
            @if($posts)
                @foreach($posts as $post)
                <a href="/admin/posts/{{$post->id}}">
                    <h2>{{$post->title}}</h2>
                    <div>{{$post->body}}</div>
                    Created by <small>{{$post->user->name}}</small>
                    <br/>

                </a>
                @if(Auth::user())
                    @if(Auth::user()->id == $post->user->id)
                    <a href="/admin/posts/{{$post->id}}/edit" class="btn">Edit</a>
                    <a href="/admin/posts/{{$post->id}}/publish" class="btn publish ">Publish</a>
                    <form method="POST" action="/admin/posts/{{$post->id}}">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    @endif
                @endif
            @endforeach
                {{$posts->links()}}
            @else
                <h2>No posts found!</h2>
            @endif
            <br />
            <h1>
                Click <a href="/admin/posts/create">here</a> to create your post.
            </h1>
        </div>
        @endsection
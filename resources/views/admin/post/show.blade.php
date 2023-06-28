@extends('layouts.app')

@section('title','Posts')
@section('content')
<div class="container admin">
    <div class="row justify-content-center">
        <div class="col-md-2">
            @include('partials.leftmenu')
        </div>
        <div class="col-md-10">
                <h2>{{$post->title}}</h2>
                <p>{{$post->body}}</p>
                <a href="/admin/posts" class="btn btn-default">Go back</a>
        </div>
    </div>
</div>
@endsection
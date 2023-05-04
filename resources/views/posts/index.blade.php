@extends('layouts.app')

@section('title','Posts')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            @include('partials.leftmenu')
        </div>
        <div class="col-md-10">
            @if (session('message'))
            <div class="alert alert-success"> 
                {{ session('message') }}
            </div>
            @endif
            <a class="btn btn-primary" href="/admin/posts/create" role="button">Add new</a>
            @if($posts)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>FE Status</th>
                            <th>Created by</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                         <tr>
                            <td>{{$post->id}}</td>
                            <td>
                                @if ($post->category)
                                    {{$post->category->name}}
                                @endif
                            </td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->short_description}}</td>
                            <td>{{$post->status}}</td> 
                            <td>{{ $post->user->name}}</td>   
                            <td>
                                @if(Auth::user())
                                    @if(Auth::user()->id == $post->user->id)
                                    <a href="/admin/posts/{{$post->id}}/edit" class="btn btn-warning">Edit</a>
                                    @endif
                                @endif
                           </td>
                           <td>
                            <form method="POST" action="/admin/posts/{{$post->id}}">
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                           </td>                       
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h2>No posts found!</h2>
            @endif
        </div>
        @endsection
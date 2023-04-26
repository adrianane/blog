@extends('layouts.app')

@section('title','Posts')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            @include('partials.leftmenu')
        </div>
        <div class="col-md-10">
            <form method="POST" action="/admin/posts">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Add a post</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter a title">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="body" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
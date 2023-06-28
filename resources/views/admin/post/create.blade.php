@extends('layouts.app')

@section('title','Posts')
@section('content')
<div class="container admin">
    <div class="row justify-content-center">
        <div class="col-md-2">
            @include('partials.leftmenu')
        </div>
        <div class="col-md-10">
            <div class="card">          
                <div class="card-header">Create post</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Category</label>
                            <select required class="form-control" name="category_id">
                                <option value="">--Select category--</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" required class="form-control" name="title" placeholder="Enter a title">
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" required class="form-control" name="slug" placeholder="Enter a slug">
                        </div>
                        <div class="form-group">
                            <label>Body</label>
                            <textarea id="any_summernote" 
                            name="body" required class="form-control" rows="8"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" required class="form-control" name="image_path" placeholder="Enter an image">
                        </div>
                        <div class="form-group">
                            <label>Alt image</label>
                            <input type="text" required class="form-control" name="image_alt" placeholder="Enter an alt">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" name="status" id="status" />
                            <label class="form-check-label" for="status">Status(Visible in FE)</label>
                        </div>
                        <br>
                        <strong>Seo tags</strong>
                        <div class="form-group">
                            <label>Metatitle</label>
                            <input type="text" required class="form-control" name="meta_title">
                        </div>
                        <div class="form-group">
                            <label>Metadescription</label>
                            <textarea class="form-control" required name="meta_description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>MetaKeyword</label>
                            <textarea class="form-control" required name="meta_keyword" rows="3"></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title','Add category')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            @include('partials.leftmenu')
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Create category</div>
                <div class="card-body">
                	@if ($errors->any())
	                	<div class="alert alert-danger">
	                		@foreach ($errors->all() as $error)
	                			<div>{{ $error }}</div>
	                		@endforeach
	                	</div>
                	@endif
                	<form method="POST" action="/admin/categories" enctype="multipart/form-data">
		                {{ csrf_field() }}
		                <div class="form-group">
		                    <label>Name</label>
		                    <input type="text" class="form-control" name="name" value="{{ old('foo') }}">
		                </div>
		                <div class="form-group">
		                    <label>Slug</label>
		                    <input type="text" class="form-control" name="slug">
		                </div>
		                <div class="form-group">
		                    <label>Description</label>
		                    <textarea name="description" class="form-control" rows="3"></textarea>
		                </div>
		                <!--
		                <div class="form-group">
		                    <label>Image</label>
		                    <input type="file" class="form-control" name="image"/>
		                </div>
		            	-->
		                 <div class="form-check">
		                    <input class="form-check-input" type="checkbox" value="true" name="status" id="status" />
    		                <label class="form-check-label" for="status">Status(Visible in FE)</label>
		                </div>
		                <br>
		                <strong>Seo tags</strong>
		                <div class="form-group">
		                    <label>Metatitle</label>
		                    <input type="text" class="form-control" name="meta_title">
		                </div>
		                <div class="form-group">
		                    <label>Metadescription</label>
		                    <textarea class="form-control" name="meta_description" rows="3"></textarea>
		                </div>
		                <div class="form-group">
		                    <label>MetaKeyword</label>
		                    <textarea class="form-control" name="meta_keyword" rows="3"></textarea>
		                </div>
		                <button type="submit" class="btn btn-primary">Submit</button>
		            </form>
            </div>
        </div>
    </div>
</div>
@endsection
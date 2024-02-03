@extends('layouts.frontapp')

@section('title', "$post->meta_title")

@section('meta_description', "$post->meta_description")

@section('meta_keyword', "$post->meta_keyword")

@section('content')
	<div class="container mt-4 max-cont">
		<div class="row">
			<div class="col-md-8">				
				<div class="white-content min-vh-100 custom-content">
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item">
					    	<a href="{{ url('categorie/' . $post->category->slug) }}">
					    	{{$post->category->name}}
					    </a>
						</li>
					    <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
					  </ol>
					</nav>
					<hr>
					<h1 class="text-center">{{$post->title}}</h1>
					<div class="img-article text-center">
		        		<img src="{{asset( '/' . $post->image_path) }}" height="400" alt="{{ $post->image_alt }}">
		        	</div>
					<div>{!! $post->body !!}</div>
				</div>
			</div>
			<div class="col-md-4 last-articles">
				<div class="card">
					<div class="card-header">
						<h4>Ultimele articole</h4>
					</div>
					<div class="card-body">
						@foreach($latestPosts as $latestPost)
						<a href="{{ url('articol/' . $latestPost->category->slug . '/' . $latestPost->slug) }}">
							<h6> > {{ $latestPost->title }}</h6>
						</a>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection		
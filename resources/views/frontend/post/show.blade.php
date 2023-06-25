@extends('layouts.frontapp')

@section('title', "$post->meta_title")

@section('meta_description', "$post->meta_description")

@section('meta_keyword', "$post->meta_keyword")@section('content')

	<div class="container-fluid">
		<div class="row">
			<nav class="navbar navbar-expand-lg header-bottom-wrapper">
			  <div class="container-fluid">
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse main-menu justify-content-center" id="navbarNavDropdown">
			      <ul class="navbar-nav">
			      	@foreach($categories as $category)
			        <li class="nav-item">
			          <a class="nav-link" aria-current="page" href="{{ url('categorie/' . $category->slug) }}">
			          	{{ $category->name }}</a>
			        </li>
			      	@endforeach
			      </ul>
			    </div>
			  </div>
			</nav>
		</div>
	</div>
	<div class="container mt-5 max-cont">
		<div class="row">
			<div class="col-md-8">				
				<div class="white-content min-vh-100">
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
					<h1>{{$post->title}}</h1>
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
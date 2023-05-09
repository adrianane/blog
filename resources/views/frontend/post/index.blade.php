@extends('layouts.frontapp')

@section('title','Blog index')

@section('content')
<div class="container">
		<div class="row">
			<nav class="navbar navbar-expand-lg bg-light">
			  <div class="container-fluid">
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse" id="navbarNavDropdown">
			      <ul class="navbar-nav">
			      	@foreach($categories as $categoryItem)
			        <li class="nav-item">
			          <a class="nav-link active" aria-current="page" href="{{ url('categorie/' . $categoryItem->slug) }}">
			          	{{ $categoryItem->name }}</a>
			        </li>
			      	@endforeach
			      </ul>
			    </div>
			  </div>
			</nav>
		</div>
	</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
	      	<ul class="navbar-nav">
		      	@foreach($posts as $post)
			        <li class="nav-item">
			          <a class="nav-link active" aria-current="page" href="{{ url('articol/' . $category->slug . '/' . $post->slug) }}">
			          	{{ $post->title }}</a>
			        </li>
			        <h6>Posted on {{ $post->created_at->format('d-m-Y') }}</h6>
		      	@endforeach		
        	</ul>
        </div>
        <div class="col-md-2">
            right content
        </div>
    </div>
</div>
@endsection
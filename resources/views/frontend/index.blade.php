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
			      	@foreach($categories as $category)
			        <li class="nav-item">
			          <a class="nav-link active" aria-current="page" href="{{ url('categorie/' . $category->slug) }}">
			          	{{ $category->name }}</a>
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
        	Content
        </div>
        <div class="col-md-2">
            right content
        </div>
    </div>
</div>
@endsection
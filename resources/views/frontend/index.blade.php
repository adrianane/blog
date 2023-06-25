@extends('layouts.frontapp')

@section('title','Ganduri de mama')

@section('meta_description', "Blog despre nastere, parenting, bebelusi")

@section('meta_keyword', "Parenting, mama, bebe, diversificare, calatorii, nastere, regina maria")

@section('content')
<div class="container-fluid">
	<div class="row">
		<nav class="navbar navbar-expand-lg header-bottom-wrapper">
		  <div class="container-fluid">
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse main-menu nav justify-content-center" id="navbarNavDropdown">
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
    <div class="row justify-content-center">
        <div class="col-md-12 white-content short-desc">
        	Short desc before!
        	<br>
        	<br>        	
        	<br>
        </div>
    	<div class="flex-wrap">
	      	@foreach($posts as $post)
	      		<div class="flex-box white-content">
	      			<div class="flex-img">
				        <a href="/" src="#" alt="">
				        </a>
				    </div>
					<div class="flex-content white-content">
		      			<a href="{{ url('articol/' . $category->slug . '/' . $post->slug) }}">
		      				<span class="categ">{{ $post->category->name }}</span>
							<h3 class="card-title bold">{{ $post->title }}</h3>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					      	<p class="card-text"><small class="text-muted">{{ $post->created_at->format('d.m.Y') }}</small></p>
				      	</a>
					</div>
				</div>     	
	      	@endforeach		
		</div>
    	<div class="pagination">
    		{{ $posts->links() }}
    	</div>
    </div>
</div>
@endsection
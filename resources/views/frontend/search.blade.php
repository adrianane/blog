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
		      	<li class="nav-item">
		         	 <a class="nav-link {{ Request::path() == '/' ? 'active' : '' }}" aria-current="page" href="/">
			          	HOME
			          </a>
		        </li>
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

<div class="container mt-4 max-cont">
    <div class="row justify-content-center">
    	<div class="msg">
			<h2> {{ $searchResMsg }} </h2>
		</div>
    	<div class="flex-wrap">
	      	@foreach($posts as $post)
      		<div class="flex-box white-content">
		      	<div class="flex-img">
			        <a href="{{ url('articol/' . $post->category->slug . '/' . $post->slug) }}">
			        	 <img src="{{asset( '/' . $post->image_path) }}" class="w-100" alt="{{ $post->image_alt }}">
			        </a>
			    </div>
	      		<div class="white-content">
					<div class="flex-content">
		      			<a href="{{ url('articol/' . $post->category->slug . '/' . $post->slug) }}">
		      				<span class="categ">{{ $post->category->name }}</span>
							<h3 class="card-title bold">{{ $post->title }}</h3>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					      	<p class="card-text"><small class="text-muted">{{ $post->created_at->format('d.m.Y') }}</small></p>
				      	</a>
					</div>
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
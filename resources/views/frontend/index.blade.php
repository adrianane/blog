@extends('layouts.frontapp')

@section('title','Mamacado')

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
        <div class="col-md-12 white-content short-desc custom-content">
        	Bine ai venit, mami! <br><br>
        	Pe acest blog vei gasi informatii despre pregatirea inainte de nastere, despre experienta nasterii, primele zile cu bebe acasa si tot ce e nevoie pentru a intampina noul membru in familie, despre calatorii cu bebe, si alte experiente traite de mine de cand am devenit mamica. <br/></br>
        	Fiecare copil este unic, la fel ca fiecare mama si fiecare experienta! Sper sa te regasesti in postarile mele si sa fie de folos informatiile pe care am decis sa le impartasesc!
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
							<p class="card-text">{!! $post->short_description !!}</p>
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
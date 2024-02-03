@extends('layouts.frontapp')

@section('title','Mamacado')

@section('meta_description', "Blog despre nastere, parenting, bebelusi")

@section('meta_keyword', "Parenting, mama, bebe, diversificare, calatorii, nastere, regina maria")

@section('content')
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
							<div class="card-text">{!! $post->preview !!}</div>
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
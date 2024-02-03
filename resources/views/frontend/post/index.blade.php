@extends('layouts.frontapp')

@section('title', "$category->meta_title")

@section('meta_description', "$category->meta_description")

@section('meta_keyword', "$category->meta_keyword")

@section('content')
<div class="container mt-4 max-cont custom-content">
    <div class="row justify-content-center">
        <div class="col-md-12">
    		<div class="flex-wrap">
		      	@foreach($posts as $post)
		      		<div class="flex-box white-content">
		      			<div class=" flex-img">
					        <a href="{{ url('articol/' . $category->slug . '/' . $post->slug) }}">
                                <img src="{{asset( '/' . $post->image_path) }}" class="w-100" alt="{{ $post->image_alt }}">
					        </a>
					    </div>
						<div class="flex-content white-content">
							<a href="{{ url('articol/' . $category->slug . '/' . $post->slug) }}" class="card-link">
								<h3 class="card-title bold">{{ $post->title }}</h3>
								 <div class="card-text">{!! $post->preview !!}</div>
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
</div>
@endsection
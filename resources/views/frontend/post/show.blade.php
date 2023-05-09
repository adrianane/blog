@extends('layouts.frontapp')
@section('title','Articol')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<h6>{{$post->category->name}} / {{ $post->title }}</h6>
				<h1>{{$post->title}}</h1>
				<div>{!! $post->body !!}</div>
			</div>
			<div class="col-md-3">
				<div class="card mt-3">
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
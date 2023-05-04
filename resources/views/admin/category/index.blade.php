@extends('layouts.app')

@section('title','Add category')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            @include('partials.leftmenu')
        </div>
        <div class="col-md-10">
        	@if (session('message'))
        	<div class="alert alert-success"> 
        		{{ session('message') }}
        	</div>
        	@endif
			<a class="btn btn-primary" href="/admin/categories/create" role="button">Add new</a>
			@if($categories)
			<table class="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Description</th>
						<th>FE Status</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $category)
					 <tr>
					 	<td>{{$category->id}}</td>
					 	<td>{{$category->name}}</td>
					 	<td>{{$category->description}}</td>
					 	<td>{{$category->status}}</td>  
		                <td>
		                <a href="/admin/categories/{{$category->id}}/edit" class="btn btn-warning">Edit</a>
		               </td>
		               <td>
		               	<form method="POST" action="/admin/categories/{{$category->id}}">
		                    <input type="hidden" name="_method" value="DELETE">
		                    {{ csrf_field() }}
		                    <button type="submit" class="btn btn-danger">Delete</button>
		                </form>
		               </td>		               
                	</tr>
            	@endforeach
				</tbody>
			</table>	
            @else
                <h2>No categories found!</h2>
            @endif
            <br />
        </div>
    </div>
</div>
@endsection
@extends('layout')
@section('content')

<h1> Create a new Project</h1>

<form method="POST" action="/projects">


	{{csrf_field()}}
	
	<div class="field">

		<label class="label" for="title">Project Title</label>
		

		<div class="control">
		
		<input type="text" name="title" class="input {{$errors->has('title') ? 'is-danger' :''}}" value="{{old('title')}}">
	</div>


	</div>

	<div class="field">

		<label class="label" for="description">Project Description</label>
		

		<div class="control">
		
		<textarea name="description" class="textarea {{$errors->has('title') ? 'is-danger' :''}}">{{old('description')}}</textarea>
	</div>


	</div>


	<div class='field'>
		<div class="control">
		

		<button type="submit" class="button is-link">Create Project</button>

	</div>
</div>

	@include('errors')





</form>
@endsection
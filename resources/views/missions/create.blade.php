@extends('layouts.master')

@section('content')

<div class="container">
  <h1>Create New Mission</h1>
	
	{!! Form::open(['route' => 'missions.store', 'class' => 'form-horizontal']) !!}
	
	@if(count($errors) > 0)
        <div class="alert alert-danger">There were problems with your form. Please fix them.</div>
      @endif
	
    <div class="form-group {{ $errors->has('title') ? 'has-error text-danger' : '' }}">
        <label for="title" class="col-sm-2 control-label">Mission Title</label>
        <div class="col-sm-10">
        	{!! Form::text('title', $mission->title, ['class' => 'form-control']) !!}
        	@include('partials.error-help-block', ['field' => 'title'])
        </div>
  	</div>
  	<div class="form-group {{ $errors->has('description') ? 'has-error text-danger' : '' }}">
        <label for="description" class="col-sm-2 control-label">Description</label>
        <div class="col-sm-10">
        	{!! Form::textarea('description', $mission->description, ['class' => 'form-control', 'rows' => '5']) !!}
        	@include('partials.error-help-block', ['field' => 'description'])
        </div>
  	</div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Create Mission</button>
	    </div>
	  </div>
	{!! Form::close() !!}
</div>


@endsection
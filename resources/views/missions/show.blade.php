@extends('layouts.master')

@section('content')
	
	<div class="container">
		
		@if(count($errors) > 0)
			<div class="alert alert-danger">There were problems with your attempt form. Please scroll down and fix them.</div>
		@endif

		<h1>{{ $mission->title }}</h1>
		<p>{{ $mission->description }}</p>
		<p>Made by {{ $mission->user->name }}</p>
		<p><img src="{{ $mission->image->url('hero') }}" alt=""></p>

		<h2>Attempts</h2>
		@foreach($attempts as $attempt)
			<p><img src="{{ $attempt->image->url('thumb') }}" alt="" class="img-rounded">
				By: {{ $attempt->user->name }}
			</p>
		@endforeach

		<h3>Add New Attempt</h3>
	    {!! Form::open(['url' => '/missions/' . $mission->id . '/attempts', 'class' => 'form-horizontal', 'files' => true]) !!}

			<div class="form-group {{ $errors->has('image') ? 'has-error text-danger' : '' }}">
				<label for="image" class="col-sm-2 control-label">Attempt Image</label>
				<div class="col-sm-10">
				{!! Form::file('image', ['class' => 'form-control', 'rows' => '5']) !!}
				@include('partials.error-help-block', ['field' => 'image'])
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Submit Attempt</button>
				</div>
			</div>
		{!! Form::close() !!}

	</div>


@endsection
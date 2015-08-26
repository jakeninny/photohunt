@extends('layouts.master')

@section('content')
	
	<div class="container">
		
		@if(count($errors) > 0)
			<div class="alert alert-danger">There were problems with your attempt form. Please scroll down and fix them.</div>
		@endif

		<h1>{{ $mission->title }}</h1>
		<p>{{ $mission->description }}</p>
		<p>
	      Made by {{ $mission->user->name }}
	      @if(Auth::check() && Auth::user()->id === $mission->user->id)
	        (You!)
	      @endif
	    </p>

	    @if(Auth::check() && Auth::user()->id === $mission->user->id)
	      <p><img src="{{ $mission->image->url('hero') }}" alt=""></p>
	      <p><a href="{{ route('missions.edit', $mission->id) }}" class="btn btn-default">
	      <span class="glyphicon glyphicon-pencil"></span> Edit Mission</a></p>
	    @endif

	    <h2>Attempts – {{ $successTally }} success from {{ $attemptTally }} attempts</h2>
	    <div class="container">
	    @foreach($attempts as $attempt)
	      @if(Auth::check() && (Auth::user()->id === $mission->user->id || Auth::user()->id === $attempt->user->id))

        <div class="row">
          <div class="col-sm-2">
            <p><img src="{{ $attempt->image->url('thumb') }}" alt=""
              class="img-rounded @include('missions._attempt_class', ['attempt' => $attempt]) "></p>
          </div>
          <div class="col-sm-10">
            <p>{{ $attempt->user->name }}</p>
            <p>
              <a href="{{ route('missions.attempts.edit', [$mission->id, $attempt->id]) }}" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Edit Attempt</a>
			
			 @if(Auth::check() && (Auth::user()->id === $mission->user->id))

              {!! Form::open(['route' => ['missions.attempts.update', $attempt->mission_id, $attempt->id], 'class' => 'form-horizontal', 'files' => true, 'method' => 'PUT']) !!}
                <div class="btn-group" role="group" aria-label="Change Status">
                  <button type="submit" class="btn btn-success @include('missions._attempt_active', ['attempt' => $attempt, 'status' => 'success'])" name="status" value="success">Success</button>
                  <button type="submit" class="btn btn-warning @include('missions._attempt_active', ['attempt' => $attempt, 'status' => 'almost'])" name="status" value="almost">Almost</button>
                  <button type="submit" class="btn btn-danger @include('missions._attempt_active', ['attempt' => $attempt, 'status' => 'miss'])" name="status" value="miss">Miss</button>
                  <button type="submit" class="btn btn-info @include('missions._attempt_active', ['attempt' => $attempt, 'status' => 'unchecked'])" name="status" value="unchecked">Unchecked</button>
                </div>
              {!! Form::close() !!}

              @endif
            </p>
          </div>
        </div>
      @endif
    @endforeach
    </div>


		<h3>Add New Attempt</h3>
		@if(Auth::check() && Auth::user()->id !== $mission->user->id)
	    {!! Form::open(['route' => ['missions.attempts.store', $mission->id], 'class' => 'form-horizontal', 'files' => true]) !!}

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
		@elseif(Auth::check() && Auth::user()->id === $mission->user->id)
	    	<p>You can't submit an attempt on a mission you set.</p>
		@else
			<p><a href="{{ route('auth.login') }}">Log in</a> to submit an attempt on this mission.</p>
		@endif
	</div>


@endsection
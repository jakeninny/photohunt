@extends('layouts.master')

@section('content')
  <div class="container">
    <h1>Edit Mission Attempt</h1>

    {!! Form::open(['route' => ['missions.attempts.update', $attempt->mission_id, $attempt->id], 'class' => 'form-horizontal', 'files' => true]) !!}
      {!! Form::hidden('_method', 'PUT') !!}

      <div class="form-group {{ $errors->has('image') ? 'has-error text-danger' : '' }}">
        <label for="image" class="col-sm-2 control-label">Attempt Image</label>
        <div class="col-sm-10">
          {!! Form::file('image', ['class' => 'form-control', 'rows' => '5']) !!}
          @include('partials.error-help-block', ['field' => 'image'])
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Current Image</label>
        <div class="col-sm-10">
          <img src="{{ $attempt->image->url('thumb') }}" alt="" class="img-rounded">
        </div>
      </div>
      
      @if(Auth::check() && (Auth::user()->id === $attempt->mission->user->id))
     
      <div class="form-group {{ $errors->has('status') ? 'has-error text-danger' : '' }}">
        <label class="col-sm-2 control-label">Current Photo</label>
        <div class="col-sm-10">
          <p>
            <label class="checkbox-inline">
              {!! Form::radio('status', 'success', $attempt->status === 'success') !!} Success
            </label>
            <label class="checkbox-inline">
            {!! Form::radio('status', 'almost', $attempt->status === 'almost') !!} Almost
            </label>
            <label class="checkbox-inline">
              {!! Form::radio('status', 'miss', $attempt->status === 'miss') !!} Miss
            </label>
            <label class="checkbox-inline">
              {!! Form::radio('status', 'unchecked', $attempt->status === 'unchecked') !!} Unchecked
            </label>
          </p>
          @include('partials.error-help-block', ['field' => 'status'])
        </div>
      </div>
      
      @endif

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Update Attempt</button>
        </div>
      </div>
    {!! Form::close() !!}
  </div>
@endsection
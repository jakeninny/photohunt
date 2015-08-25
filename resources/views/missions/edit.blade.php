@extends('layouts.master')

@section('content')
  <div class="container">
    <h1>Edit Mission</h1>

{!! Form::open(['route' => ['missions.update', $mission->id], 'class' => 'form-horizontal', 'files' => true]) !!}
      {!! Form::hidden('_method', 'PUT') !!}

      @include('missions._form')

      <div class="form-group">
        <label class="col-sm-2 control-label">Current Image </label>
        <div class="col-sm-10">
          <img src="{{ $mission->image->url('thumb') }}" alt="" class="img-rounded">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Edit Mission</button>
        </div>
      </div>
    {!! Form::close() !!}
  </div>
@endsection
@extends('layouts.master')

@section('content')
	
	<div class="container">
		<h1>{{ $mission->title }}</h1>
		<p>{{ $mission->description }}</p>
		<p>Made by {{ $mission->user->name }}</p>
		<p><img src="{{ asset('images/missions/' . $mission->filename) }}" alt=""></p>
	</div>


@endsection
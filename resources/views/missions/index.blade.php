@extends('layouts.master')

@section('content')
	
	<div class="container">
		<h1>Missions</h1>
			<ul>
				@foreach($missions as $mission)
					<li>{{ $mission->title }}</li>
				@endforeach
			</ul>
	</div>


@endsection
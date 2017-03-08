@extends('layout')

@section('content')

@if(isset($birthday))

	<h1>Bewerken verjaardag</h1>

	<?php
	var_export($birthday);
	?>

		<form role="form" method="post" action="edit_action.php">
			<div>
				<input type="hidden" name="id" id="id" value="{{$birthday['id']}}">
				<label for="naam">Naam</label>
				<input type="text" id="naam" name="naam" value="{{$birthday['person']}}">
			</div>
			<div>
				<label for="verjaardag">Verjaardag</label>
				<input type="number" id="dag" name="dag" value="{{$birthday['day']}}">
				<input type="number" id="maand" name="maand" value="{{$birthday['month']}}">
				<input type="number" id="jaar" name="jaar" value="{{$birthday['year']}}">
			</div>
			<input type="submit" name="btn-submit" id="submit" value="Submit">
		</form>

@endif

@endsection
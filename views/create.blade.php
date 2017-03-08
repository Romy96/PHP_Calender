@extends('layout')

@section('content')

<h1>Voer een verjaardag in</h1>

		<form role="form" method="post" action="create_action.php">
			<div>
				<label for="naam">Naam</label>
				<input type="text" id="naam" name="naam" placeholder="vul je voornaam in">
			</div>
			<div>
				<label for="verjaardag">Verjaardag</label>
				<input type="number" id="dag" name="dag" placeholder="vul de dag van jouw geboortedatum in">
				<input type="number" id="maand" name="maand" placeholder="vul de maand van jouw geboortedatum in">
				<input type="number" id="jaar" name="jaar" placeholder="vul de jaar van jouw geboortedatum in">
			</div>
			<input type="submit" name="btn-submit" id="submit" value="Submit">
		</form>

@endsection
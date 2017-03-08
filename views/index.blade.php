@extends('layout')

@section('content')

		<h1>Verjaardagen</h1>
         @if(isset($birthday))
        @foreach ($birthday as $row)
        <p>
            <a href="edit.php?id={{$row['id']}}">
                {{$row['person']}} ({{$row['day']}}/{{$row['month']}}/{{$row['year']}})</a>
                
            <a href="delete_action.php?id={{$row['id']}}">x</a>
        </p>
        @endforeach
        @endif

        <p><a href="create.php">+ Toevoegen</a></p>

@endsection
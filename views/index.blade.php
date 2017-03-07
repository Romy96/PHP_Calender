@extends('layout')

@section('content')

    @if(isset($birthday))
        @foreach ($birthday as $row)
		<h1>{{$row['month']}}</h1>
        <p>
            <a href="edit.php?id={{$row['id']}}">
                {{$row['person']}} ({{$row['day']}}/{{$row['month']}}/{{$row['year']}})</a>
                
            <a href="delete.php?id={{$row['id']}}">x</a>
        </p>
    @endforeach
    @endif

        <p><a href="create.php">+ Toevoegen</a></p>

@endsection
<!doctype html>

<html>
	<head>
		<title>Verjaardagskalender</title>
        <link href="css/main.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
    @if(isset($birthday))
        @foreach ($birthday as $row)
		<h1>{{$row['month']}}</h1>
		<h2>{{$row['day']}}</h2>
        <p>
            <a href="edit.php?id={{$row['id']}}">
                {{$row['person']}} {{$row['year']}}</a>
                
            <a href="delete.php?id={{$row['id']}}">x</a>
        </p>
    @endforeach
    @endif
    
        <p><a href="create.php">+ Toevoegen</a></p>

	</body>
</html>
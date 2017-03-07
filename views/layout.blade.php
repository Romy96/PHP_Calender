
<!doctype html>

<html>
	<head>
		<title>Verjaardagskalender</title>
        <link href="css/main.css" rel="stylesheet" type="text/css">
	</head>

	<body>

	<?php
	   if ( isset($_SESSION['errors'])) {
	      $errors = $_SESSION['errors'];
	      $_SESSION['errors'] = array();  // remove all errors
	   } 
	   else
	   {
	      $_SESSION['errors'] = array();
	   }
	 ?>
	 

	  @if(count($errors)>0)     {{-- does $errors have any errors? --}}
	     <div style="background-color: #ff4d4d; border: 2px solid #c73e3e; color: black;">
	    <h3>Error(s):</h3>
	      <ul>
	        @foreach ($errors as $error)   
	          <li>{{ $error }}</li>
	        @endforeach
	      </ul>
	    </div>
	  @endif

	<div class="content">
	@yield('content')
	</div>

	</body>
</html>
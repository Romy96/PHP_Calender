<?php 

 require_once 'inc/session.php';
 require_once 'inc/blade.php';
 $errors = [];

 require 'inc/connection.php';

	$id = $_GET['id'];

	$sth = $db->prepare("SELECT * FROM birthdays WHERE id=?");
	// controleer of er een foutmelding is ontstaan en zo ja, plaats die dan in $_SESSION['errors'][] = $msg

	if ($sth->execute(array($id)))
	{
  		$birthday = $sth->fetch(PDO::FETCH_ASSOC);	
  		if ( $sth->rowCount() == 0 ) $_SESSION['errors'][] = 'Kan verjaardag met id '. $id .' niet vinden';
		if ( $sth->rowCount() > 1 ) $_SESSION['errors'][] = 'Je haalt teveel rijen op';
	}
	else
	{
		$_SESSION['errors'][] = 'Het is niet gelukt om de gegevens op te halen.';
	}


	// tell blade to create HTML from the template "login.blade.php"
	echo $blade->view()->make('Edit')->with('birthday', $birthday)->withErrors($errors)->render();


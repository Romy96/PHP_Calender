<?php

require_once 'inc/session.php';
require 'inc/connection.php';

$birthday_id = $_GET['id'];

$sth = $db->prepare("DELETE FROM birthdays WHERE id=?");
// controleer of er een foutmelding is ontstaan en zo ja, plaats die dan in $_SESSION['errors'][] = $msg

if ($sth->execute(array($birthday_id)))
{
  	if ( $sth->rowCount() == 0 ) $_SESSION['errors'][] = 'Kan vejaardag met id '. $birthday_id .' niet vinden';
	if ( $sth->rowCount() > 1 ) $_SESSION['errors'][] = 'Je verwijderd teveel rijen';
	if ( $sth->rowCount() == 1 ) $_SESSION['errors'][] = 'De verjaardag is van de database verwijderd';
	header('location: index.php');
}
else
{
	$_SESSION['errors'][] = 'Het is niet gelukt om de gegevens op te halen en te verwijderen.';
	header('location: index.php');
}


?>
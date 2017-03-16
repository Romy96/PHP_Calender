<?php
require 'inc/connection.php';
require 'inc/session.php';

$Naam = $_POST['naam'];
$Dag = $_POST['dag'];
$Maand = $_POST['maand'];
$Jaar = $_POST['jaar'];
$id = $_POST['id'];

$sql = $db->prepare("UPDATE birthdays SET person=?, day=?, month=?, year=? WHERE id=?");
if ($sql->execute(array($Naam, $Dag, $Maand, $Jaar, $id))) {
	if ( $sql->rowCount() == 0 ) {
		$_SESSION['errors'][] = 'Kan verjaardag met id '. $id .' niet vinden';
		header('location: Edit.php?id=' . $id);
		exit;
	}
	if ( $sql->rowCount() > 1 ) {
		$_SESSION['errors'][] = 'Je wijzigt teveel rijen';
		header('location: Edit.php?id=' . $id);
		exit;
	}
	if ( $sql->rowCount() == 1 ) {
		$_SESSION['errors'][] = 'De aangepaste gegevens zijn opgeslagen in de database';
		header("location: index.php");
		exit;
	}
}

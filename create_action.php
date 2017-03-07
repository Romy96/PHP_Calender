<?php
require 'inc/connection.php';
require 'inc/session.php';
require 'inc/post.php';

$Naam = $_POST['naam'];
$Dag = $_POST['dag'];
$Maand = $_POST['maand'];
$Jaar = $_POST['jaar'];

if (empty($_POST['naam']) || empty($_POST['dag']) || empty($_POST['maand']) || empty($_POST['jaar'])) {
	$_SESSION['errors'][] = 'Één of meerdere velden zijn niet ingevuld of er gaat iets niet goed.';
	header('Location: create.php');
	exit;
}

$sql = $db->prepare("INSERT INTO birthdays (person, day, month, year) VALUES (?, ?, ?, ?)");
if ($sql->execute(array($Naam, $Dag, $Maand, $Jaar))) {
	if ($sql->rowCount() == 0) {
		$_SESSION['errors'][] = 'Het is niet gelukt om de gegevens in te voeren';
		header('Location: create.php');
		exit;
	}
	if ($sql->rowCount() == 1) {
		$_SESSION['errors'][] = 'De gegevens van uw verjaardag zijn succesvol ingevoerd.';
		header('Location: index.php');
		exit;
	}
}

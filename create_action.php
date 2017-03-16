<?php
//die('entering create_action.php');


require 'inc/connection.php';
require 'inc/session.php';

$Naam = $_POST['naam'];
$Dag = $_POST['dag'];
$Maand = $_POST['maand'];
$Jaar = $_POST['jaar'];

var_dump($_POST);

if (empty($_POST)) {
	$_SESSION['errors'][] = "Er is niks ingevuld of post is leeg!";
	header('location: create.php');
	exit;
}

if (!empty($_POST)) {

	$sql = $db->prepare("INSERT INTO birthdays (person, day, month, year) VALUES (?, ?, ?, ?)");

	if ($sql->execute(array($Naam, $Dag, $Maand, $Jaar))) {
    $_SESSION['errors'][] = 'De gegevens zijn ingevuld en opgeslagen in de database.';
    header('Location: index.php');
    exit;
}
else
{
    $_SESSION['errors'][] = 'Er is iets fout gegaan in de database. Probeer het later nog eens.';
    header('Location: create.php');
    exit;
}

}

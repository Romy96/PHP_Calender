<?php
require 'inc/connection.php';
require 'inc/session.php';
require 'inc/post.php';

var_dump($_POST);

if (empty($_POST)) {
	$_SESSION['errors'][] = "Er is niks ingevuld of post is leeg!";
	//header('location: create.php');
	exit;
}

if (!empty($_POST)) {
	$sql = $db->prepare("INSERT INTO birthdays (person, day, month, year) VALUES (:naam, :dag, :maand, :jaar)");

	$sql->bindParam(':naam', $_POST['naam']);
	$sql->bindParam(':dag', $_POST['dag']);
	$sql->bindParam(':maand', $_POST['maand']);
	$sql->bindParam(':jaar', $_POST['jaar']);

	$Naam = $_POST['naam'];
	$Dag = $_POST['dag'];
	$Maand = $_POST['maand'];
	$Jaar = $_POST['jaar'];

	$sql->execute();

	// Redirect to index.php
	//header('Location: index.php');
	exit;
}

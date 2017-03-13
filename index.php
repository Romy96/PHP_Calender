<?php 
 require_once 'inc/session.php';
 require_once 'inc/blade.php';
 $errors = [];

 require 'inc/connection.php';

 $sql = $db->prepare("SELECT * FROM birthdays ORDER BY month ASC, day ASC, year ASC");
 $sql->execute();

 $birthdays = $sql->fetchAll(PDO::FETCH_ASSOC);

 // output everything
echo $blade->view()->make('index')->with('birthdays', $birthdays)->withErrors($errors)->render();

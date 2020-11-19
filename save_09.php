<?php 

$text = $_POST['text'];


$pdo = new PDO("mysql:host=localhost;port=3307;dbname=tasks_db;","root","");
$sql = "INSERT INTO my_table (text) VALUES (:text)";
$statement = $pdo->prepare($sql);
$statement->execute(['text'=> $text]);


exit("<meta http-equiv='refresh' content='0; url= /task_9.php'>");





?>
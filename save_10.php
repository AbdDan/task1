<?php 
session_start();
$text = $_POST['text'];


$pdo = new PDO("mysql:host=localhost;port=3307;dbname=tasks_db;","root","");
$sql = "SELECT * FROM my_table WHERE text=:text";
$statement = $pdo->prepare($sql);
$statement->execute(['text'=>$text]);
$task = $statement->fetch(PDO::FETCH_ASSOC);


if(!empty($task)) {

	$message = "Введеная запись уже существует в таблице";
	$_SESSION['danger'] = $message;
	exit("<meta http-equiv='refresh' content='0; url= /task_10.php'>");
}



$sql = "INSERT INTO my_table (text) VALUES (:text)";
$statement = $pdo->prepare($sql);
$statement->execute(['text'=> $text]);

$message = "Введеная запись уже существует в таблице";
$_SESSION['success'] = $message;


exit("<meta http-equiv='refresh' content='0; url= /task_10.php'>");





?>
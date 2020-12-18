<?php
session_start();
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'testing';
$message = '';
try{
$conn  = new PDO("mysql:host=$host;dbname=$db",$username, $password);


}
catch(PDOException $e){
	$message = "Error " . $e->getMessage();

}



?>
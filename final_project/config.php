<?php

$user = 'phillipsa18';
$password = 'de573563';

$database = new PDO('mysql:host=csweb.hh.nku.edu;dbname=db_fall20_phillipsa18', $user, $password);

session_start();

$current_url = basename($_SERVER['REQUEST_URI']);

function autoloader($class) 
{
	include 'classes/class.' . $class . '.php';
}

spl_autoload_register('autoloader');

if (!isset($_SESSION['username']) AND $current_url != "login.php")
{
	header("location: login.php");
}

else if(isset($_SESSION['username']))
{
	$sql = file_get_contents('sql/attemptLogin.sql');
	$params = array(
		'username' => $_SESSION['username']
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$user = $statement->fetchAll(PDO::FETCH_ASSOC);
}

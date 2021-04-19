<?php

include('config.php');

include('functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	if(isset($_POST['create_user'])) 
	{
		$username = $_POST['create_user'];
		
		$sql = file_get_contents('sql/insert_users.sql');
		$params = array(
			'username' => $username
		);
		$statement = $database->prepare($sql);
		$statement->execute($params);
	}
	
	else if(isset($_POST['username']))
	{
		$username = $_POST['username'];
	}
	
	
	$sql = file_get_contents('sql/attemptLogin.sql');
	$params = array(
		'username' => $username
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$users = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	if(!empty($users)) 
	{
		{
			$user = $users[0];
			$_SESSION['username'] = $user['username'];
			header('location:index.php');
		}
	}
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Login</title>

	<style>
	html 
	{
		height: 100%;
        	background-color: light-blue;
        	background-image: linear-gradient(to top left, #FFFFFF, #99CCFF, #FF0000);
	}
		
	body 
	{
		box-sizing: border-box;
		font-family: arial;
	}
		
	.page 
	{
		max-width: 800px;
		margin: 10px auto;
		background-color: white;
		padding: 20px 30px;
	}
	</style>

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  	<![endif]-->
</head>
<body>
	<div class="page">
		<h1>Create Account</h1>
		<form method="POST">
			<input type="text" name="create_user" placeholder="Enter Your Name" />
			<input type="submit" value="Create Account" />
		</form>
		<br>
		<h1>Login</h1>
		<form method="POST">
			<input type="text" name="username" placeholder="Enter Your Name" />
			<input type="submit" value="Log In" />
		</form>
	</div>
</body>
</html>

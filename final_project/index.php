<?php

// Create and include a configuration file with the database connection
include('config.php');

// Include functions for application
include('functions.php');

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<!--link rel="stylesheet" href="css/style.css"-->
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
	
	pre 
	{
		font-family: arial;
	}
	</style>
	
  	<title>Pokemon Team Planner</title>
</head>
<body>
	<div class="page">
	<h1><?php echo $_SESSION['username']?>'s PC</h1>
		<pre>
<a href="pokedex.php">PokeDex</a>				                                       <a href="team_builder.php">Team Builder</a>				                                 <a href="logout.php">Logout</a>
		</pre>
	</div>
</body>
</html>

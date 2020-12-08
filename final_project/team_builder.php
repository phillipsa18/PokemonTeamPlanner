<?php 
	include('config.php');
	include('functions.php');
	
	$sql = file_get_contents('sql/get_pokemon.sql');
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$mons = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<html lang="en">
<head>
	<meta charset="utf-8">
		
	<title>Team Builder</title>
	
	<style>
	html {
		height: 100%;
        background-color: light-blue;
        background-image: linear-gradient(to top left, #FFFFFF, #99CCFF, #FF0000);
	}
	body {
		box-sizing: border-box;
		font-family: arial;
	}
	.page {
		max-width: 800px;
		margin: 10px auto;
		background-color: white;
		padding: 20px 30px;
	}
	</style>
	
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
	<script>
		// If only it was this easy
		$(function() {
			var list = <!--?php echo $mons ?-->
		$( "#pkmn" ).autocomplete({
			source: availableTags
			});
		} );
	</script>
</head>
<body>
	<div class="page">
		<h1><?php echo $_SESSION['username']?>'s PC</h1>
		<h2>Build A Team</h2>
		<a href="index.php">Back to Main Menu</a>
		<a href="pokedex.php">Back to PokeDex</a>
		<form method = "GET" action="index.php">
			<p><input id="pkmn" name="1" type="text"> Pokemon 1</input></p>
			<p><input id="pkmn" name="2" type="text"> Pokemon 2</input></p>
			<p><input id="pkmn" name="3" type="text"> Pokemon 3</input></p>
			<p><input id="pkmn" name="4" type="text"> Pokemon 4</input></p>
			<p><input id="pkmn" name="5" type="text"> Pokemon 5</input></p>
			<p><input id "pkmn" name="6" type="text"> Pokemon 6</input></p>
		</form>
		<input type="submit">
	</div>
</body>
</html>
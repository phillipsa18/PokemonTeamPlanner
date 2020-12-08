<?php 
	include('config.php');
	
	include('functions.php');
	
	$action = $_GET['action'];
	
	$p_name = get('name');
	
	if($action == 'edit')
	{
		$p = new Pkmn();
		$p->set_Pokemon($p_name, $database);
	}
	
	
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nat_dex = $_POST['nat_dex'];
	$name = $_POST['p_name'];
	$type1 = $_POST['type1'];
	$type2 = $_POST['type2'];
	$HP = $_POST['HP'];
	$ATK = $_POST['ATK'];
	$DEF = $_POST['DEF'];
	$SPD = $_POST['SPD'];
	$SATK = $_POST['SATK'];
	$SDEF = $_POST['SDEF'];
	
	if($action == 'add') {
		$sql = file_get_contents('sql/insertPokemon.sql');
		$params = array(
			'DexNum' => $nat_dex,
			'Name' => $name,
			'Type1' => $type1,
			'Type2' => $type2,
			'HP' => $HP,
			'Atk' => $ATK,
			'Def' => $DEF,
			'Spd' => $SPD,
			'SpAtk' => $SATK,
			'SpDef' => $SDEF
		);
		$statement = $database->prepare($sql);
		$statement->execute($params);
	}
	
	elseif ($action == 'edit') {
		$sql = file_get_contents('sql/updatePokemon.sql');
		$params = array(
			'DexNum' => $nat_dex,
			'Name' => $name,
			'Type1' => $type1,
			'Type2' => $type2,
			'HP' => $HP,
			'Atk' => $ATK,
			'Def' => $DEF,
			'Spd' => $SPD,
			'SpAtk' => $SATK,
			'SpDef' => $SDEF
		);
		$statement = $database->prepare($sql);
		$statement->execute($params);
	}
	
	header('location: pokedex.php');
}
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<title>Insert a New Pokemon</title>
	
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
	
</head>
<body>
	<div class="page">
	<h1><?php echo $_SESSION['username']; ?>'s PC</h1>
	<h2>Insert a New Pokemon</h2>
	<a href="index.php">Back to Main Menu</a>
	<a href="pokedex.php">Back to PokeDex</a>
	<form action="" method="POST">
	<ul>
		<?php if($action == "edit") : ?>
		<p><input name="nat_dex" type="text" value="<?php echo $p->get('dex_num'); ?>"> National Dex Number</input></p>
		<p><input name="p_name" type="text" value="<?php echo $p->get('name'); ?>"> Name</input></p>
		<p><input name="type1" type="text" value="<?php echo $p->get('type1'); ?>"> Primary Type</input></p>
		<?php if(!empty($p->get('type2'))): ?>
			<p><input name="type2" type="text" value="<?php echo $p->get('type2'); ?>"> Secondary Type (if applicable)</input></p>
		<?php endif; ?>
		<p><input name="HP" type="text" value="<?php echo $p->get('hp'); ?>"> Base HP</input></p>
		<p><input name="ATK" type="text" value="<?php echo $p->get('atk'); ?>"> Base Attack</input></p>
		<p><input name="DEF" type="text" value="<?php echo $p->get('def'); ?>"> Base Defense</input></p>
		<p><input name="SPD" type="text" value="<?php echo $p->get('sAtk'); ?>"> Base Speed</input></p>
		<p><input name="SATK" type="text" value="<?php echo $p->get('sDef'); ?>"> Base Special Attack</input></p>
		<p><input name="SDEF" type="text" value="<?php echo $p->get('spd'); ?>"> Base Special Defense</input></p>
		<?php else: ?>
		<p><input name="nat_dex" type="text"> National Dex Number</input></p>
		<p><input name="p_name" type="text"> Name</input></p>
		<p><input name="type1" type="text"> Primary Type</input></p>
		<p><input name="type2" type="text"> Secondary Type (if applicable)</input></p>
		<p><input name="HP" type="text"> Base HP</input></p>
		<p><input name="ATK" type="text"> Base Attack</input></p>
		<p><input name="DEF" type="text"> Base Defense</input></p>
		<p><input name="SPD" type="text"> Base Speed</input></p>
		<p><input name="SATK" type="text"> Base Special Attack</input></p>
		<p><input name="SDEF" type="text"> Base Special Defense</input></p>
		<?php endif; ?>
	</ul>
		<input type="submit" value="Submit" />
	</form>
	</div>
</body>
</html>
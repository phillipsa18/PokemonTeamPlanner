<?php
	include('config.php');
	include('functions.php'); 

	$term = get('search-term');
	
	$pkmn = name_dex_search($term, $database);
?>

<!doctype html>
<html lang = "en">
<head>
	<meta charset="utf-8">
	
	<title>PokeDex</title>
	
	<style>
	html 
	{
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
	
	table 
	{
		margin-top: 10px;
		margin-bottom: 10px;
	}
	
    	td 
	{
        	text-align: center;
       		vertical-align: middle;
	}
	
	a 
	{
		margin-top: 10px;
	}
	</style>

</head>
<body>
	<div class="page">
	<h1><?php echo $_SESSION['username']?>'s PC</h1>
	<h2>PokeDex</h2>
	<form method="GET">
		<input type="text" name="search-term" placeholder="Enter a Pokemon Name..." />
		<input type="submit" />
	</form>
	
	<a href="new_pokemon.php?action=add">Add a New Pokemon</a>
	<a href="index.php">Back to Main Menu</a>
	<?php $p = new Pkmn(); ?>
	<?php foreach($pkmn as $pm) : ?>
		<?php $p->set_Pokemon($pm['Name'], $database); ?>
		<div class="entry">
		<p>
			<?php echo $p->get('dex_num'); ?>
			<?php echo $p->get('name'); ?>
			<?php echo $p->get('type1'); ?> 
			<?php if(!empty($p->get('type2'))): ?>
				<?php echo $p->get('type2'); ?> 
			<?php endif; ?>
		</p>
		<a href="new_pokemon.php?action=edit&name=<?php echo $p->get('name'); ?>">Edit Pokemon</a>
		<p>Base Stats:</p>
		<table style="width:100%">
			<tr>
				<th>HP</th>
				<th>Attack</th>
				<th>Defense</th>
				<th>Special Attack</th>
				<th>Special Defense</th>
				<th>Speed</th>
				<th>Total</th>
			</tr>
			<tr>
				<td><?php echo $p->get('hp'); ?></td>
				<td><?php echo $p->get('atk'); ?></td>
				<td><?php echo $p->get('def'); ?></td>
				<td><?php echo $p->get('sAtk'); ?></td>
				<td><?php echo $p->get('sDef'); ?></td>
				<td><?php echo $p->get('spd'); ?></td>
				<td><?php echo $p->base_stat_total(); ?></td>
			</tr>
		</table>
		<p>Weaknesses:</p>
		<?php $weaknesses = $p->get_weaknesses($database); ?>
		<?php foreach($weaknesses as $weakness) : ?>
			<p><?php echo $weakness; ?></p>
		<?php endforeach; ?>
		<br>
		<!-- Weaknesses/Resistances with secondary typing needs more testing -->
		<!--?php if(!empty($p->get('type2'))): ?-->
			<!--?php $weaknesses2 = $p->get_second_weaknesses($database); ?-->
			<!--?php foreach($weaknesses2 as $weakness2) : ?-->
				<!--p><!--?php echo $weakness2; ?--></p-->
			<!--?php endforeach; ?-->
		<!--?php endif; ?-->
		<p>Resistances:</p>
		<?php $resistances = $p->get_resistances($database); ?>
		<?php foreach($resistances as $resistance) : ?>
			<p><?php echo $resistance; ?></p>
		<?php endforeach; ?>
		<!--?php $resistances2 = $p->get_second_resistances($database); ?-->
		<!--?php if(!empty($p->get('type2'))): ?-->	
			<!--?php foreach($resistances2 as $resistance2) : ?-->
			<!--p><!--?php echo $resistance2; ?--></p-->
			<!--?php endforeach; ?-->
		<!--?php endif; ?-->
		</div>
		<br>
	<?php endforeach; ?>
	</div>
</body>
</html>

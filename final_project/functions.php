<?php
function name_dex_search($name, $database) {
	$name = $name . '%';
	$sql = file_get_contents('sql/search_by_name.sql');
	$params = array(
		'Name' => $name
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$mons = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $mons;
}

function get($key) {
	if(isset($_GET[$key])) {
		return $_GET[$key];
	}
	
	else {
		return '';
	}
}
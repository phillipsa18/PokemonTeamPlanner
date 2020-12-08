<?php

class Pkmn {
	private $dex_num;
	private $name;
	private $type1;
	private $type2;
	private $hp;
	private $atk;
	private $def;
	private $sAtk;
	private $sDef;
	private $spd;
	
	function set_Pokemon($p_name, $database)
	{
		$mons = name_dex_search($p_name, $database);
		$mon = $mons[0];
		$this->dex_num = $mon['DexNum'];
		$this->name = $mon['Name'];
		$this->type1 = $mon['Type1'];
		$this->type2 = $mon['Type2'];
		$this->hp = $mon['HP'];
		$this->atk = $mon['Atk'];
		$this->def = $mon['Def'];
		$this->sAtk = $mon['SpAtk'];
		$this->sDef = $mon['SpDef'];
		$this->spd = $mon['Spd'];
	}
	
	function base_stat_total()
	{
		return $this->hp + $this->atk + $this->def + $this->sAtk + $this->sDef + $this->spd;
	}
	
	function get_weaknesses($database)
	{
		$sql = file_get_contents('sql/get_weaknesses.sql');
		$params = array(
			'Typing' => $this->type1,
			'Name' => $this->name
		);
		$statement = $database->prepare($sql);
		$statement->execute($params);
		$weak1 = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		#Removes the null values
		$weak1 = array_unique($weak1);
		$weak1 = array_pop($weak1);
		
		return $weak1;
	}
	
	function get_second_weaknesses($database)
	{
		$sql = file_get_contents('sql/get_weaknesses.sql');
			$params = array(
				'Typing' => $this->type2,
				'Name' => $this->name
			);
			$statement = $database->prepare($sql);
			$statement->execute($params);
			$weak2 = $statement->fetchAll(PDO::FETCH_ASSOC);
			
			#Removes the null values
			$weak2 = array_unique($weak2);
			$weak2 = array_pop($weak2);
		
		return $weak2;
	}
	
	function get_resistances($database)
	{
		$sql = file_get_contents('sql/get_resistances.sql');
		$params = array(
			'Typing' => $this->type1,
			'Name' => $this->name
		);
		$statement = $database->prepare($sql);
		$statement->execute($params);
		$resist1 = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		#Removes the null values
		$resist1 = array_unique($resist1);
		$resist1 = array_pop($resist1);
		
		return $resist1;
	}
	
	function get_second_resistances($database)
	{
		$sql = file_get_contents('sql/get_resistances.sql');
			$params = array(
				'Typing' => $this->type2,
				'Name' => $this->name
			);
			$statement = $database->prepare($sql);
			$statement->execute($params);
			$resist2 = $statement->fetchAll(PDO::FETCH_ASSOC);
			
			#Removes the null values
			$resist2 = array_unique($resist2);
			$resist2 = array_pop($resist2);
		
		return $resist2;
	}
	
	function get($key)
	{
		return $this->$key;
	}
}
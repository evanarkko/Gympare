<?php

class Trainer extends BaseModel{
	public $id, $name, $trainer_name, $password, $weight, $height, $gender;

	public function __construct($attributes){
		parent::__construct($attributes);
	}


	


	public static function all(){
		$query = DB::connection()->prepare('SELECT * FROM Trainer');
		$query->execute();

		$rows = $query->fetchAll();
		$trainers = array();

		
		foreach ($rows as $row) {
			$trainers[] = new Trainer(array(
				'id' => $row["id"],
				'name' => $row['name'],
				'trainer_name' => $row['trainername'],
				'password' => $row['password'],
				'weight' => $row['weight_in_kg'],
				'height' => $row['height_in_cm'],
				'gender' => $row['gender']	
			));
		}



		return $trainers;	
	}


	public static function find($id){
		$query = DB::connection()->prepare('SELECT * FROM Trainer WHERE id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();

		if($row){
			$trainer = new Trainer(array(
				'id' => $row["id"],
				'name' => $row['name'],
				'trainer_name' => $row['trainername'],
				'password' => $row['password'],
				'weight' => $row['weight_in_kg'],
				'height' => $row['height_in_cm'],
				'gender' => $row['gender']
			));
			return $trainer;
		}
		return null;
	}

	public static function authenticate($username, $password){
		
	}
}


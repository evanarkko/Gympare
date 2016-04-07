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
				'id' => row['Id'],
				'name' => row['Name'],
				'trainer_name' => row['Trainername'],
				'password' => row['Password'],
				'weight' => row['Weight_in_kg'],
				'height' => row['Height_in_cm'],
				'gender' => row['Gender'],
			));
		}

		return $trainers;	
	}
}

?>
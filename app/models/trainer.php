<?php

if (!class_exists('Trainer')) {
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

	public function authenticate($username, $password){
		$query = DB::connection()->prepare('SELECT * FROM Trainer WHERE trainername = :username AND password = :password LIMIT 1');
		$query->execute(array('username' => $username, 'password' => $password));
		$row = $query->fetch();
		if($row){
			return new Trainer(Array(
					'id' => $row["id"],
					'name' => $row['name'],
					'trainer_name' => $row['trainername'],
					'password' => $row['password'],
					'weight' => $row['weight_in_kg'],
					'height' => $row['height_in_cm'],
					'gender' => $row['gender']
				));
		}
		
		return null;	
	}

	public function save(){
		$query = DB::connection()->prepare('INSERT INTO Trainer (Name, Trainername, Password, Weight_in_kg, Height_in_cm, Gender)
											 VALUES (:name, :username, :password, :weight, :height, :gender) RETURNING id');
		$query->execute(array('name' => $this->name, 'username' => $this->trainer_name, 'password' => $this->password,
		 					'weight' => $this->weight, 'height' => $this->height, 'gender' => $this->gender));
		$row = $query->fetch();
		$this->id = $row['id'];
	}
}
}	

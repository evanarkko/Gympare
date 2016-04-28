<?php


class Workout extends BaseModel{
	public $id, $name, $trainer_id, $workout_time, $description;

	public function __construct($attributes){
		parent::__construct($attributes);
	}

	public static function all(){
		$query = DB::connection()->prepare('SELECT * FROM Workout');
		$query->execute();

		$rows = $query->fetchAll();
		$workouts = array();

		foreach($rows as $row){
			$workouts[] = new Workout(array(
				'id' => $row['id'],
				'name' => $row['name'],
				'trainer_id' => $row['trainerid'],
				'workout_time' => $row['workouttime'],
				'description' => $row['description']
			));
		}
		return $workouts;
	}

	public static function find($id){
		$query = DB::connection()->prepare('SELECT * FROM Workout WHERE id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();

		if($row){
			$workout = new Workout(array(
				'id' => $row['id'],
				'name' => $row['name'],
				'trainer_id' => $row['trainerid'],
				'workout_time' => $row['workouttime'],
				'description' => $row['description']
				));
			return $workout;
		}
		return null;
	}

	public function save(){
		if(!strcmp($this->name, ""))return;
		$query = DB::connection()->prepare('INSERT INTO Workout (Name, TrainerId, WorkoutTime, Description) VALUES (:name, 1, NOW(), :description) RETURNING id');
		$query->execute(array('name' => $this->name, 'description' => $this->description));
		// $row = $query->fetch();
		// $this->id = $row['id'];
		//NÄITÄ EI KAIT TARTTE
	}
}

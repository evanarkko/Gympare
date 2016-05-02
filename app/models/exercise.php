<?php

if (!class_exists('Exercise')) {
class Exercise extends BaseModel{
	public $id, $workout_id, $name, $weight, $sets;

	public function __construct($attributes){
		parent::__construct($attributes);
	}

	public static function findByWorkout($id){
		$query = DB::connection()->prepare('SELECT * FROM WeightExercise WHERE workoutid = :id');
		$query->execute(array('id' => $id));
		$rows = $query->fetchAll();

		$exercises = array();

		foreach($rows as $row){
			$exercises[] = new Exercise(array(
				'id' => $row['id'],
				'workout_id' => $row['workoutid'],
				'name' => $row['name'],
				'weight' => $row['weight'],
				'sets' => $row['sets']
				));
		}
		return $exercises;
	}

	public function save(){
		if(!strcmp($this->name, ""))return;
		$query = DB::connection()->prepare('INSERT INTO weightExercise (WorkoutId, Name, Weight, Sets) VALUES (:workoutid, :name, :weight, :sets) RETURNING id');
		$query->execute(array('name' => $this->name, 'workoutid' => $this->workout_id, 'weight' => $this->weight, 'sets' => $this->sets));
		$row = $query->fetch();
		$this->id = $row['id'];
		//NÄITÄ EI KAIT TARTTE
	}
}
}

if (!class_exists('Trainer')) {
class Cardio extends BaseModel{
	 public $id, $workout_id, $name, $duration, $distance;

	 public function __construct($attributes){
	 	parent::__construct($attributes);
	 }

	 public static function findByWorkout($id){
	 	$query = DB::connection()->prepare('SELECT * FROM CardioExercise WHERE workoutid = :id');
	 	$query->execute(array('id' => $id));
	 	$rows = $query->fetchAll();

	 	$cardios = array();

	 	foreach($rows as $row){
	 		$cardios[] = new Cardio(array(
	 			'id' => $row['id'],
				'workout_id' => $row['workoutid'],
				'name' => $row['name'],
				'duration' => $row['duration'],
				'distance' => $row['distance']
	 			));
	 	}

	 	return $cardios;
	}

	public function save(){
		if(!strcmp($this->name, ""))return;
		$query = DB::connection()->prepare('INSERT INTO CardioExercise (WorkoutId, Name, Duration, Distance) VALUES (:workoutid, :name, :dur, :dist) RETURNING id');
		$query->execute(array('name' => $this->name, 'workoutid' => $this->workout_id, 'dur' => $this->duration, 'dist' => $this->distance));
		// $row = $query->fetch();
		// $this->id = $row['id'];
		//NÄITÄ EI KAIT TARTTE
	}

	public function destroy($id){
		$query = DB::connection()->prepare('DELETE FROM WeightExercise WHERE id = :id');
		$query->execute(array('id' => $id));
	}
}
}
<?php


class Workout extends BaseModel{
	public $id, $trainer_id, $workout_time, $description;

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
				'id' => row['Id'],
				'trainer_id' => row['TrainerId'],
				'workout_time' => row['WorkoutTime'],
				'description' => row['Description']
			));
		}
		return $workouts;
	}

	public static function find($id){
		$query = DB::connection()->prepare('SELECT * FROM Workout WHERE Id = :id LIMIT 1');
		$query->execute(array('Id' => $id));
		$row = $query->fetch();

		if($row){
			$workout = new Workout(array(
				'id' => row['Id'],
				'trainer_id' => row['TrainerId'],
				'workout_time' => row['WorkoutTime'],
				'description' => row['Description']
				));
			return workout;
		}
		return null;
	}
}


?>
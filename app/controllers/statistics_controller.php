<?php

require 'app/models/workout.php';
require 'app/models/exercise.php';
 class StatsController extends BaseController{
 	public static function returnPushups($trainerid){
 		$query = DB::connection()->prepare('SELECT * FROM ExerciseSet WHERE
 												ExerciseId IN (SELECT Id FROM WeightExercise WHERE
 													Name LIKE :pushups AND
 													WorkoutId IN (SELECT Id FROM Workout WHERE
 														TrainerId = :trainerid))');
 		$query->execute(array('trainerid' => $trainerid, 'pushups' => '%ushup%'));
		$rows = $query->fetchAll();

		$yhteensa = 0;
		foreach ($rows as $row){
			$yhteensa += $row['reps']; 
		}

		return $yhteensa;
 	}

 	public static function returnPullups($trainerid){
 		$query = DB::connection()->prepare('SELECT * FROM ExerciseSet WHERE
 												ExerciseId IN (SELECT Id FROM WeightExercise WHERE
 													Name LIKE :pullups AND
 													WorkoutId IN (SELECT Id FROM Workout WHERE
 														TrainerId = :trainerid))');
 		$query->execute(array('trainerid' => $trainerid, 'pullups' => '%ullup%'));
		$rows = $query->fetchAll();

		$yhteensa = 0;
		foreach ($rows as $row){
			$yhteensa += $row['reps']; 
		}

		return $yhteensa;
 	}

 	public static function returnDistanceRun($trainerid){
 		$query = DB::connection()->prepare('SELECT * FROM CardioExercise WHERE
 												LOWER(Name) LIKE LOWER(:run) AND
 												WorkoutId IN (SELECT Id FROM Workout WHERE
 														TrainerId = :trainerid)');
 		$query->execute(array('trainerid' => $trainerid, 'run' => '%run%'));
		$rows = $query->fetchAll();

		$yhteensa = 0;
		foreach ($rows as $row){
			$yhteensa += $row['distance']; 
		}

		return $yhteensa;
 	}

 	public static function returnCalories($trainerid){
 		
 	}
 }


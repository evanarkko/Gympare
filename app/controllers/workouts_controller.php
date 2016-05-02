<?php
require 'app/models/workout.php';
require 'app/models/exercise.php';
 class WorkoutController extends BaseController{

	public static function index(){
		$workouts = Workout::findCurrentUsersWorkouts();	
		View::make('workout_list.html', array('workouts' => $workouts));
	}

	public static function addWorkout(){
		$tiedot = $_POST;
		$trainerid = $_SESSION['user'];

		$workout = new Workout(array(
			'name' => $tiedot['name'],
			'description' => $tiedot['description'],
			'trainer_id' => $trainerid
		));

		$workout->save();
		Redirect::to('/workout_list', array('message' => 'Workout on lisätty kirjastoosi!'));
	}

	public static function addExercise(){
		$tiedot = $_POST;
		$workout_id = $tiedot['workoutid'];

		$exercise = new Exercise(array(
			'weight' => $tiedot['weight'],
			'name' => $tiedot['name'],
			'workout_id' => $workout_id
		));

		$exercise->save();
		Redirect::to('/exercise_list/' . $workout_id);
	}

	public static function addCardio(){
		$tiedot = $_POST;
		$workout_id = $tiedot['workoutid'];

		$cardio = new Cardio(array(
			'distance' => $tiedot['distance'],
			'duration' => $tiedot['duration'],
			'name' => $tiedot['name'],
			'workout_id' => $workout_id
		));

		$cardio->save();
		Redirect::to('/exercise_list/' . $workout_id);
	}	


    public static function show($id){
    	$workout = Workout::find($id);
	    $exercises = Exercise::findByWorkout($id);
	    $cardios = Cardio::findByWorkout($id);

 		View::make('exercise_list.html', array('thisid' => $id, 'name' => $workout->name, 'description' => $workout->description, 'date' => $workout->workout_time, 'exercises' => $exercises, 'cardios' => $cardios));   
    }

}
<?php
require 'app/models/workout.php';
require 'app/models/exercise.php';
 class WorkoutController extends BaseController{

	public static function index(){
		$workouts = Workout::all();	
		View::make('workout_list.html', array('workouts' => $workouts));
	}

	public static function addWorkout(){
		$tiedot = $_POST;

		$workout = new Workout(array(
			'name' => $tiedot['name'],
			'description' => $tiedot['description']
		));

		$workout->save();
		Redirect::to('/workout_list', array('message' => 'Workout on lisätty kirjastoosi!'));
	}

	public static function addExercise($workout_id){
		$tiedot = $_POST;
		// $workout_id = 1;

		$exercise = new Exercise(array(
			'weight' => $tiedot['weight'],
			'name' => $tiedot['name'],
			'workout_id' => $workout_id
		));

		$exercise->save();
	}

    public static function show($id){
    	$workout = Workout::find($id);
	    $exercises = Exercise::findByWorkout($id);
	    $cardios = Cardio::findByWorkout($id);

 		View::make('exercise_list.html', array('thisid' => $id, 'name' => $workout->name, 'description' => $workout->description, 'date' => $workout->workout_time, 'exercises' => $exercises, 'cardios' => $cardios));   
    }

}
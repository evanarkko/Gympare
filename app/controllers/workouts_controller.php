<?php
require 'app/models/workout.php';
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

    public static function exerciseList(){
      View::make('exercise_list.html');
    }
}
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

}
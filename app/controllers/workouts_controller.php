<?php
require 'app/models/workout.php';
require 'app/models/exercise.php';
 class WorkoutController extends BaseController{

	public static function index(){
		$workouts = Workout::findCurrentUsersWorkouts();
		//SORT WORKOUTS?
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
	public static function destroyWorkout($id){
    	$tiedot = $_POST;
    	$workout = new Workout(array('id' => $id));
    	$workout->destroy();
		Redirect::to('/workout_list', array('message' => 'Workout on poistettu!'));

    }

    public static function displayEdit($id){
    	$query = DB::connection()->prepare('SELECT Name FROM Workout WHERE id = :id');
    	$query->execute(array('id' => $id));
    	$row = $query->fetch();

    	View::make('workout_edit.html', array('workoutname' => $row['name'], 'id' => $id));
    }

    public static function edit($id){
    	$tiedot = $_POST;

		$query0 = DB::connection()->prepare('SELECT * FROM Workout WHERE id = :id LIMIT 1');
		$query0->execute(array('id' => $id));
		$row = $query0->fetch();

    	if(!$tiedot['date']){
    		$date = $row['workouttime'];
    	}else{
    		$date = $tiedot['date'];
    	}
    	if(!$tiedot['name']){
    		$name = $row['name'];
    	}else{
    		$name = $tiedot['name'];
    	}
    	// if(!$tiedot['date']){
    	// 	$date = $row['workouttime'];
    	// }else{
    	// 	$date = $tiedot['date'];
    	// }

    	$workout = new Workout(array(
    			'id' => $id,
    			'name' => $name,
    			'workout_time' => $date,
    			'description' => $tiedot['description']
    		));

    	$workout->edit();
    	Redirect::to('/workout_list', array('message' => 'Workouttia on muokattu!'));
    }

}
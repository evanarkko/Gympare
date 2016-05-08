<?php
require 'app/models/workout.php';
require 'app/models/exercise.php';
 class ExerciseController extends BaseController{


	public static function addExercise(){
		$tiedot = $_POST;
		$workout_id = $tiedot['workoutid'];

		if($tiedot['weight']){
			$weight = $tiedot['weight'];
		}else{
			$weight = 0;
		}

		$exercise = new Exercise(array(
			'weight' => $weight,
			'name' => $tiedot['name'],
			'workout_id' => $workout_id,
			'sets' => $tiedot['sets']
		));


		$exercise->save();

		$str = $tiedot['sets'];
		preg_match_all('!\d+!', $str, $matches);
		foreach ($matches as $nr){
			foreach ($nr as $reps){
				ExerciseController::addSet($exercise->id, $reps);
			}
		}
		Redirect::to('/exercise_list/' . $workout_id);
	}

	private static function addSet($exerciseid, $reps){
		$query = DB::connection()->prepare('INSERT INTO ExerciseSet (ExerciseId, Reps) VALUES (:exerciseid, :reps)');
		$query->execute(array('exerciseid' => $exerciseid, 'reps' => $reps));
	}

	public static function addCardio(){
		$tiedot = $_POST;
		$workout_id = $tiedot['workoutid'];

		if($tiedot['distance']){
			$distance = $tiedot['distance'];
		}else{
			$distance = 0;
		}
		if($tiedot['duration']){
			$duration = $tiedot['duration'];
		}else{
			$duration = 0;
		}

		$cardio = new Cardio(array(
			'distance' => $distance,
			'duration' => $duration,
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
	    $total = count($exercises) + count($cardios);

	    View::make('exercise_list.html', array('thisid' => $id, 'name' => $workout->name, 'description' => $workout->description, 'date' => $workout->workout_time, 'exercises' => $exercises, 'cardios' => $cardios, 'total' => $total));   
    }

    public static function destroyExercise(){
    	$tiedot = $_POST;
    	$exercise = new Exercise(array('id' => $tiedot['id']));
    	$workout_id = $exercise->destroy($tiedot['id']); //TÄMÄ VOI ESIM PALAUTTAA WORKOUTIDN REDIRECCTIÄ VARTEN
    	Redirect::to('/exercise_list/' . $workout_id);
    }
    public static function destroyCardio(){
    	$tiedot = $_POST;
    	$cardio = new Cardio(array('id' => $tiedot['id']));
    	$workout_id = $cardio->destroy(); //TÄMÄ VOI ESIM PALAUTTAA WORKOUTIDN REDIRECCTIÄ VARTEN
    	Redirect::to('/exercise_list/' . $workout_id);
    }

}
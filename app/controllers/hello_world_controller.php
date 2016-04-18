<?php
  
require 'app/models/trainer.php';
  class HelloWorldController extends BaseController{
    
    public static function login(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
      View::make('login.html');
    }

    public static function signup(){
      View::make('signup.html');
    }

    public static function mainView(){
      View::make('main_view.html');
    }

    public static function workoutList(){
      View::make('workout_list.html');
    }

    public static function sandbox(){
      $workouts = Workout::find(1);

      Kint::dump($workouts);
    }

    public static function exerciseList(){
      View::make('exercise_list.html');
    }
  }

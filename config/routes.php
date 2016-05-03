<?php
require 'app/controllers/workouts_controller.php';
require 'app/controllers/trainers_controller.php';
require 'app/controllers/exercise_controller.php';
require 'app/controllers/statistics_controller.php';

  function check_logged_in(){
    BaseController::check_logged_in();
  }

  $routes->get('/', function() {
    TrainerController::login();
  });

  $routes->post('/login', function(){
    TrainerController::handleLogin();
  });


  $routes->post('/signup', function() {
    TrainerController::signup();
  });

  $routes->get('/main_view', 'check_logged_in', function() {
    TrainerController::mainView();
  });
  $routes->post('/logout', function(){
    BaseController::logout();
  });

  $routes->get('/calorie_instructions', function(){
    View::make('calorie_instructions.html');
  });


  $routes->get('/sandbox', function() {
    HelloWorldController::sandbox();
  });

  $routes->get('/workout_list', function(){
    WorkoutController::index();
  });
  $routes->post('/workout_list', function(){
    WorkoutController::addWorkout();
  });

  
  $routes->get('/exercise_list/:id', function($id){
    ExerciseController::show($id);
  });
  $routes->post('/exercise_list', function(){
    ExerciseController::addExercise();
  });
  $routes->post('/cardio_list', function(){
    ExerciseController::addCardio();
  });
  $routes->post('/delete_exercise/:id', function(){
    die('moi');
    ExerciseController::destroyExercise();
  });


$routes->get('/friend_search', function(){
    View::make('friend_search.html');
  });
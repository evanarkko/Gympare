<?php
require 'app/controllers/workouts_controller.php';
require 'app/controllers/trainers_controller.php';

  $routes->get('/', function() {
    TrainerController::login();
  });

  $routes->post('/login', function(){
    TrainerController::handleLogin();
  });


  $routes->post('/signup', function() {
    TrainerController::signup();
  });

  $routes->get('/main_view', function() {
    TrainerController::mainView();
  });


  $routes->get('/sandbox', function() {
    HelloWorldController::sandbox();
  });

  $routes->get('/workout_list', function(){
    WorkoutController::index();

  });
  $routes->post('/workout_list', function(){
    // die('fak');
    WorkoutController::addWorkout();
  });

  
  $routes->get('/exercise_list/:id', function($id){
    WorkoutController::show($id);
  });
  $routes->post('/exercise_list', function(){
    WorkoutController::addExercise();
  });
  $routes->post('/cardio_list', function(){
    WorkoutController::addCardio();
  });


<?php
require 'app/controllers/workouts_controller.php';
require 'app/controllers/trainers_controller.php';

  $routes->get('/', function() {
    TrainerController::login();
  });

  $routes->post('/login', function(){
    TrainerController::handleLogin();
  });


  $routes->get('/signup', function() {
    HelloWorldController::signup();
  });

  $routes->get('/main_view', function() {
    HelloWorldController::mainView();

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
  $routes->post('/exercise_list/:id', function($id){
    WorkoutController::addExercise();
  });


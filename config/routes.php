<?php
require 'app/controllers/workouts_controller.php';

  $routes->get('/', function() {
    HelloWorldController::login();
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
    WorkoutController::addWorkout();
  });

  $routes->get('/exercise_list', function(){
    WorkoutController::exerciseList();
  });

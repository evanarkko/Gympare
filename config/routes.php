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

  $routes->get('/workout_list', 'check_logged_in', function(){
    WorkoutController::index();
  });
  $routes->post('/workout_list', function(){
    WorkoutController::addWorkout();
  });

  $routes->get('/workout_edit/:id', function($id){
    WorkoutController::displayEdit($id);
  });
  $routes->post('/workout_edit/:id', function($id){
    WorkoutController::edit($id);
  });
  $routes->post('/workout_delete/:id', function($id){
    WorkoutController::destroyWorkout($id);
  });

  
  $routes->get('/exercise_list/:id', 'check_logged_in', function($id){
    ExerciseController::show($id);
  });
  $routes->post('/exercise_list', function(){
    ExerciseController::addExercise();
  });
  $routes->post('/cardio_list', function(){
    ExerciseController::addCardio();
  });
  $routes->post('/delete_exercise', function(){
    ExerciseController::destroyExercise();
  });
  $routes->post('/delete_cardio', function(){
    ExerciseController::destroyCardio();
  });


$routes->get('/friend_search', function(){
    View::make('friend_search.html');
  });
$routes->post('/friend_search', function(){
    FriendController::searchFriends();
});
$routes->post('/friend_add/:id', function($id){
    FriendController::createFriendship($id);
});

$routes->get('/friend_view/:id', function($id) {
  TrainerController::friendView($id);
});
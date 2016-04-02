<?php

  $routes->get('/', function() {
    HelloWorldController::login();
  });

  $routes->get('/signup', function() {
    HelloWorldController::signup();
  });

  $routes->get('/main_view', function() {
    HelloWorldController::mainView();
  });

  $routes->get('/add_workout', function() {
    HelloWorldController::addWorkout();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

<?php
require 'app/models/trainer.php';
class TrainerController extends BaseController{
	public static function login(){
		View::make('login.html');
	}

	public static function handleLogin(){
		$params = $_POST;

        $user = Trainer::authenticate($params['username'], $params['password']);
    	
    	if(!$user){
    		die('fak ju');
    	}else{
    		Redirect::to('/main_view', array('name' => $user->name));
    	}
    }
}


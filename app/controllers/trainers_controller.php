<?php
class TrainerController extends BaseController{
	public static function login(){
		View::make('login.html');
	}

	public static function handleLogin(){
		$params = $_POST;
    	
    	if($params['username'] == $params['password']){
    		die('kyl');
    	}else{
    		die('ei');
    	}
    }
}


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
            $_SESSION['user'] = $user->id;
    		Redirect::to('/main_view', array('name' => $user->name));
    	}
    }

    public static function signup(){
        $params = $_POST;

        $password = $params['password'];
        $password2 = $params['password_again'];

        if($password!=$password2){
            die('nou');
        }

        $trainer = new Trainer(array(
            'name' => $params['name'],
            'trainer_name'=> $params['username'],
            'password' => $password,
            'weight'=> $params['weight'],
            'height'=> $params['height'],
            'gender'=> $params['gender']
            ));
        $trainer->save();
        $_SESSION['user'] = $trainer->id;
        Redirect::to('/main_view', array('name' => $trainer->name));

    }

    public static function mainView(){
      $id = $_SESSION['user'];
      $trainer = Trainer::find($id);
      View::make('main_view.html', array('name' => $trainer->name));
    }
}
// "weight"
// "height"
// "gender"
// "username"
// "password"
// "password_again"

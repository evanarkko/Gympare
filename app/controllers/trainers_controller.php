<?php
require 'app/models/trainer.php';
require 'app/controllers/friends_controller.php';
class TrainerController extends BaseController{
	public static function login(){
		View::make('login.html', array('message' => 'Tervetuloa Gympareen!'));
	}

	public static function handleLogin(){
		$params = $_POST;

        $user = Trainer::authenticate($params['username'], $params['password']);
    	
    	if(!$user){
    		View::make('login.html', array('message' => 'Väärä nimi tai salasana!'));
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
        $punnerrukset = StatsController::returnPushups($id);
        $leuat = StatsController::returnPullups($id);
        $juoksua = StatsController::returnDistanceRun($id);

        $friendids = FriendController::returnFriends($id);
        $friends = array();
        foreach ($friendids as $friendid){
            $friends[] = Trainer::find($friendid);
        }



        View::make('main_view.html', array('name' => $trainer->name, 'weight' => $trainer->weight, 'height' => $trainer->height, 'gender' => $trainer->gender, 'pushups' => $punnerrukset,
         'pullups' => $leuat, 'distance' => $juoksua, 'friends' => $friends));
    }
}
// "weight"
// "height"
// "gender"
// "username"
// "password"
// "password_again"

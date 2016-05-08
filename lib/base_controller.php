<?php

  class BaseController{

    public static function check_logged_in(){
    if(!isset($_SESSION['user'])){
      Redirect::to('/', array('message' => 'Kirjaudu ensin sisään!'));
    }
  }

    public static function get_user_logged_in(){
      if(isset($_SESSION['user'])){
        $user_id = $_SESSION['user'];
        // Pyydetään User-mallilta käyttäjä session mukaisella id:llä
        $user = Trainer::find($user_id);

        return $user;
      }

    // Käyttäjä ei ole kirjautunut sisään
      return null;
    }

    public static function logout(){
    $_SESSION['user'] = null;
    Redirect::to('/', array('message' => 'Olet kirjautunut ulos!'));
  }
    

    // public static function check_logged_in(){
    //   if(isset($_SESSION['user'])){
    //     return 1;
    //   }
    //   return 0;
    // }

  }

<?php
require 'app/models/trainer.php';
class FriendController extends BaseController{
	public static function returnFriends($id){
		$friends = array();

		$firstquery = DB::connection()->prepare('SELECT Trainer2_Id FROM Friendship WHERE
												Trainer1_Id = :id');
		$firstquery->execute(array('id' => $id));
		$ids = $firstquery->fetchAll();


		foreach($ids as $thisid){
			$friends[] = $thisid['trainer2_id'];
		}


		$secondquery = DB::connection()->prepare('SELECT Trainer1_Id FROM Friendship WHERE
												Trainer2_Id = :id');
		$secondquery->execute(array('id' => $id));
		$ids2 = $secondquery->fetchAll();


		foreach($ids2 as $id){
			$friends[] = $id['trainer1_id'];
		}

		return $friends;
 	}

 	public static function searchFriends(){
 		$tiedot = $_POST;
 		$hakusana = $tiedot['searchterm'];


 		Redirect::to('/friend_search', array('friends' => Trainer::findByName($hakusana)));
 	}

 	public static function createFriendship($friend2_id){
 		$friend1_id = $_SESSION['user'];

 		if($friend1_id > $friend2_id){
 			$ekaid = $friend2_id;
 			$tokaid = $friend1_id;
 		} else {
 			$ekaid = $friend1_id;
 			$tokaid = $friend2_id;
 		}

 		$query0 = DB::connection()->prepare('SELECT * FROM Friendship WHERE Trainer1_Id = :ekaid AND Trainer2_Id = :tokaid'); //TARKISTETAAN YSTÄVYYDEN OLEMASSAOLO
 		$query0->execute(array('ekaid' => $ekaid, 'tokaid' => $tokaid));
 		$rows = $query0->fetchAll();


 		if($ekaid == $tokaid){
 			Redirect::to('/friend_search', array('message' => 'Et voi lisätä itseäsi kaveriksi (Eihän siinä olisi mitään järkeä)'));
 		}elseif(count($rows)==0){
 			$query = DB::connection()->prepare('INSERT INTO Friendship (Trainer1_Id, Trainer2_Id, status, action_trainerid) VALUES (:ekaid, :tokaid, 1, :actionid)'); //LUODAAN YSTÄVYYS
 			$query->execute(array('ekaid' => $ekaid, 'tokaid' => $tokaid, 'actionid' => $friend1_id));
 			Redirect::to('/friend_search', array('message' => 'A new friend has been added! Yay!'));
 		}else{
 			Redirect::to('/friend_search', array('message' => 'Ystävyys on jo olemassa'));
 		}
	}
}
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
}
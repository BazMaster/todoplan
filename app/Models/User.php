<?php
namespace App\Models;

use Exception;
use PDO;

class User
{
	public static function find($arr = array()){
		global $db;

		if(empty($arr)){
			$st = $db->prepare("SELECT * FROM users");
		}
		else if($arr['id']){
			$st = $db->prepare("SELECT * FROM users WHERE id=:id");
		}
		else{
			throw new Exception("Unsupported property!");
		}

		$st->execute($arr);

		return $st->fetchAll(PDO::FETCH_CLASS, "Users");
	}

}
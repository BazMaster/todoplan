<?php
namespace App\Models;

use Exception;
use PDO;

class Task
{
	public static function find($arr = array()){
		global $db;

		if(empty($arr)){
			$st = $db->prepare("SELECT * FROM tasks");
		}
		else if($arr['id']){
			$st = $db->prepare("SELECT * FROM tasks WHERE id=:id");
		}
		else{
			throw new Exception("Unsupported property!");
		}

		$st->execute($arr);

		return $st->fetchAll(PDO::FETCH_CLASS);
//		return $st->fetchAll(PDO::FETCH_CLASS, "Task");
	}

}
<?php
namespace App\Controllers;

use App\Models\Task;

class MainController
{
	public static function showAction()
	{
		$content = Task::find();

		$output = render('template',array(
			'title'		=> 'Добро пожаловать в TodoPlan',
			'content'	=> $content,
			'tpl'  => '_main'
		));

		return $output;
	}
	public static function addAction()
	{
		if ($_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {return "Это не ajax-запрос!";}

		$result = array(
			'type' => 'success',
			'content' => $_POST,
		);
		print json_encode($result);
	}
}

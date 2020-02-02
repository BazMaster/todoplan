<?php
namespace App\Controllers;

use App\Models\Task;

class MainController
{
	public static function defaultAction()
	{
		$content = Task::find();

		render('template',array(
			'title'		=> 'Добро пожаловать в TodoPlan',
			'content'	=> $content
		));
	}
	public static function secondAction()
	{
		echo 'Hello from '.__METHOD__.'!';
	}
}

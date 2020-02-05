<?php
namespace App\Controllers;

use App\Models\Task;

class MainController
{
	public static function showAction()
	{
		$content = Task::all();

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

		$data = array();
		parse_str($_POST['data'], $data);

		$task = new Task;
		$status = 'success';
		foreach($data as $key => $value) {
			if(!empty($value)) {
				$value = strip_tags($value);
				$value = htmlentities($value, ENT_QUOTES, "UTF-8");
				$value = htmlspecialchars($value, ENT_QUOTES);
				$content[$key] = print_r($value,1);
				$task->$key = $value;
			} else {
				$status = 'error';
				$errors[] = $key;
			}
		}

		if($status == 'success') {
			$task->save();

			$tasks = Task::all();
			$output = render('_table',array(
				'content'	=> $tasks,
			));

			$msg = 'Задача успешно добавлена';
		}
		else $msg = 'Заполните все поля формы правильно';

		$result = array(
			'status' => $status,
			'content' => $content,
			'output' => $output,
			'data' => $data,
			'errors' => $errors,
			'msg' => $msg,
		);
		print json_encode($result);
	}
}

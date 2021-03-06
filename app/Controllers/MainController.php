<?php
namespace App\Controllers;

use App\Models\Task;
use Illuminate\Pagination\Paginator;

class MainController
{
	public static function showAction()
	{
		$content = self::getTasks();

		$output = render('template',array(
			'title'		=> 'Добро пожаловать в TodoPlan',
			'content'	=> $content,
			'tpl'  => '_main'
		));

		return $output;
	}
	public static function addAction()
	{
		$data = array();
		$content = array();
		$output = '';
		$errors = array();

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

			$output = self::getTable($_POST['page']);

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

	public static function getTable($page = 1, $sortby = 'id', $sortdir = 'asc') {
		if($_POST['sortby']) $sortby = $_POST['sortby'];
		if($_POST['sortdir']) $sortdir = $_POST['sortdir'];
		if($_POST['page']) $page = $_POST['page'];
		$tasks = self::getTasks($page, $sortby, $sortdir);
		ob_start();
		$output = render('_table',array(
			'content'	=> $tasks,
		));
		$output = ob_get_clean();
		return $output;
	}

	public static function getTask() {
		if($_POST['id']) $id = $_POST['id'];
		$output = $msg = '';
		$status = 'error';

		$task = Task::find($id);
		if($task->id) {
			ob_start();
			$output = render('_task.edit',array(
				'task'	=> $task,
			));
			$output = ob_get_clean();
			$status = 'success';
		}
		else {
			$msg = 'Задача не найдена!';
		}

		$result = array(
			'status' => $status,
			'data' => $task,
			'output' => $output,
			'msg' => $msg,
		);
		print json_encode($result);
	}
	public static function editTask() {
		$data = array();
		$content = array();
		$output = '';
		$errors = array();

		if(isset($_SESSION['login'])) {
			parse_str($_POST['data'], $data);

			$task = Task::find($data['id']);
			$status = 'success';
			foreach($data as $key => $value) {
				if(!empty($value)) {
					$value = strip_tags($value);
					$value = htmlentities($value, ENT_QUOTES, "UTF-8");
					$value = htmlspecialchars($value, ENT_QUOTES);
					$content[$key] = print_r($value,1);
					if($key == 'description' && $value != $task->description) {
						$task->edited_by_admin = 1;
					}
					$task->$key = $value;
				} else {
					$status = 'error';
					$errors[] = $key;
				}
			}

			if($status == 'success') {
				if(empty($data['status'])) $task->status = '0';
				$task->save();

				$output = self::getTable($_POST['page']);

				$msg = 'Задача успешно изменена';
			}
			else $msg = 'Заполните форму правильно';
		}
		else {
			$status = 'login';
			$msg = 'У вас недостаточно прав, чтобы сохранить эту задачу!';
		}

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

	public static function getTasks($page = 1, $sortby = 'id', $sortdir = 'asc', $perPage = 3) {
		$sortdir = mb_strtolower($sortdir);
		$page = (int) str_replace('/get/', '', $page);
		if($sortdir == 'asc') {
			$descending = false;
		} else {
			$descending = true;
		}
		$output['tasks'] = Task::all()->sortBy($sortby, SORT_REGULAR, $descending)->forPage($page,$perPage);
		$output['count'] = Task::all()->count();
		$output['page'] = $page;
		$output['perPage'] = $perPage;
		$output['pages'] = $output['count'] / $perPage;
		$output['prev'] = $page == 1 ? 1 : $page - 1;
		$output['next'] = $page == $output['pages'] ? $page : $page + 1;
		$output['sortby'] = $sortby;
		$output['sortdir'] = $sortdir;

		return $output;
	}
}

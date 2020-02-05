<?php
namespace App\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class LoginController
{
	public static function loginAction()
	{
		if ($_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {return "Это не ajax-запрос!";}

		$data = array();
		$errors = array();

		parse_str($_POST['data'], $data);

		$status = 'error';

		$msg = 'Заполните все поля формы правильно';
		if(empty($data['login'])) {
			$errors[] = 'login';
		}
		if(empty($data['password'])) {
			$errors[] = 'password';
		}
		if(empty($errors)) {
			$pwd = md5($data['password']);
			$user = User::where('login', '=', 'admin')
				->where('password', $pwd)
				->first();
			if($user != null) {
				$status = 'success';
				$_SESSION['login'] = $user->login;
				$msg = 'Авторизация прошла успешно!';
			}
			else {
				$msg = 'Такого пользователя не существует!';
			}
		}

		$result = array(
			'status' => $status,
			'data' => $data,
			'errors' => $errors,
			'msg' => $msg,
			'user' => $pwd,
		);
		print json_encode($result);
	}

	public static function logoutAction() {
		unset($_SESSION['login']);
		header('Location: /');
		exit;
	}
}

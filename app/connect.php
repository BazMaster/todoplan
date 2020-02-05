<?php
use Illuminate\Database\Capsule\Manager as Capsule;

try {
	$capsule = new Capsule;

	$capsule->addConnection([
		'driver'    => 'mysql',
		'host'      => $db_host,
		'database'  => $db_name,
		'username'  => $db_user,
		'password'  => $db_pass,
		'charset'   => 'utf8',
		'collation' => 'utf8_unicode_ci',
		'prefix'    => '',
	]);

	$capsule->setAsGlobal();
	$capsule->bootEloquent();
}
catch(PDOException $e) {
	error_log($e->getMessage());
	die("A database error was encountered: " . $e->getMessage());
}


?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Пример на bootstrap 4: Блог - двухколоночный макет блога с пользовательской навигацией, заголовком и содержанием. Версия v4.0.0">
	<meta name="author" content="">

	<link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
	<link rel="manifest" href="/assets/favicon/site.webmanifest">
	<link rel="mask-icon" href="/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="/assets/favicon/favicon.ico">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-config" content="/assets/favicon/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">

	<title><?= formatTitle($title) ?></title>

	<link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
	<link href="/assets/css/style.css" rel="stylesheet">
</head>

<body>

<div class="container">
	<header class="px-4">
		<div class="row flex-nowrap justify-content-between align-items-center">
			<div class="col-4 py-2">
				<a href="/" class="logo">
					<img src="/assets/img/logo.png" alt="">
					<div class="animated shake d-none d-md-inline-block">
						TodoPlan
					</div>
				</a>
			</div>
			<div class="col-4 text-center site_name">
				<strong>Удобный менеджер планов</strong>
			</div>
			<div class="col-4 d-flex justify-content-end align-items-center">

				<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal"
						data-target="#loginModal">
					Войти
				</button>

				<!-- Modal -->
				<form>
					<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
						 aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="loginModalLabel">
										<i class="fas fa-user-shield"></i>
										Авторизация
									</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<label for="login_input">Логин</label>
										<input type="text" name="login" class="form-control" id="login_input">
									</div>
									<div class="form-group">
										<label for="password_input">Пароль</label>
										<input type="password" name="password" class="form-control" id="password_input">
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary"
											data-dismiss="modal">Закрыть</button>
									<button type="submit" class="btn btn-primary">Войти</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</header>

	<main role="main" class="container p-4">

		<?php render($tpl, ['content' => $content])?>

	</main>

</div>

<footer>
	<p>&copy; TodoPlan <?= date('Y') ?></p>
	<p>
		Created by <a href="https://github.com/BazMaster/todoplan" target="_blank">@BazMaster</a>
	</p>
</footer>

<script src="/assets/js/main.js"></script>
</body>
</html>

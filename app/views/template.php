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

	<!-- Bootstrap core CSS -->
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="/assets/css/css.css" rel="stylesheet">
</head>

<body>

<div class="container">
	<header class="blog-header py-3">
		<div class="row flex-nowrap justify-content-between align-items-center">
			<div class="col-4 pt-1">
				<a class="text-muted" href="#">Subscribe</a>
			</div>
			<div class="col-4 text-center">
				<a class="blog-header-logo text-dark" href="#">Large</a>
			</div>
			<div class="col-4 d-flex justify-content-end align-items-center">
				<a class="text-muted" href="#">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
				</a>
				<a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a>
			</div>
		</div>
	</header>
</div>

<main role="main" class="container">
	<?= print_r($content,1) ?>
</main>

<footer class="blog-footer">
	<p>&copy; TodoPlan <?= date('Y') ?></p>
	<p>
		<a href="#">Back to top</a>
	</p>
</footer>

<script src="/assets/js/jquery-3.4.1.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
</body>
</html>

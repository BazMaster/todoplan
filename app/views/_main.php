<form method="post" class="bg-warning mb-1 px-3 pt-3 task-add" id="form_members">
	<div class="form-row">
		<div class="col-lg col-sm-6 mb-3">
			<input type="text" class="form-control" placeholder="Имя" name="name">
		</div>
		<div class="col-lg col-sm-6 mb-3">
			<input type="email" class="form-control" placeholder="Email" name="email">
		</div>
		<div class="col-lg col-sm-6 mb-3">
			<input type="text" class="form-control" placeholder="Текст задачи"
			       name="description">
		</div>
		<div class="col-lg col-sm-6 mb-3">
			<button type="submit" class="btn btn-primary col-12">Добавить задачу</button>
		</div>
	</div>

</form>

<div class="output table-responsive">
	<?php render('_table', ['content' => $content]); ?>
</div>

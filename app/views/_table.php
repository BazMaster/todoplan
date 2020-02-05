<?php if($content['count']): ?>
	<small class="text-muted">Задач: <?= $content['count'] ?></small>
	<table class="table table-striped table-bordered table-hover table-sm"
		data-sortby="<?=$content['sortby']?>"
		data-sortdir="<?=$content['sortdir']?>"
		data-page="<?=$content['page']?>"
	>
		<thead class="thead-dark">
		<tr>
			<th scope="col" class="text-center sort" data-sortby="name">
				<span>Имя</span>
				<?php if($content['sortby'] == 'name'): ?>
					<?php if($content['sortdir'] == 'asc'): ?>
						<i class="fas fa-sort-down" data-sortdir="desc"></i>
					<?php else: ?>
						<i class="fas fa-sort-up" data-sortdir="asc"></i>
					<?php endif; ?>
				<?php endif; ?>
			</th>
			<th scope="col" class="text-center sort" data-sortby="email">
				<span>Email</span>
				<?php if($content['sortby'] == 'email'): ?>
					<?php if($content['sortdir'] == 'asc'): ?>
						<i class="fas fa-sort-down" data-sortdir="desc"></i>
					<?php else: ?>
						<i class="fas fa-sort-up" data-sortdir="asc"></i>
					<?php endif; ?>
				<?php endif; ?>
			</th>
			<th scope="col">Текст задачи</th>
			<th scope="col" class="text-center sort" data-sortby="status">
				<span>Статус</span>
				<?php if($content['sortby'] == 'status'): ?>
					<?php if($content['sortdir'] == 'asc'): ?>
						<i class="fas fa-sort-down" data-sortdir="desc"></i>
					<?php else: ?>
						<i class="fas fa-sort-up" data-sortdir="asc"></i>
					<?php endif; ?>
				<?php endif; ?>
			</th>
			<?php if(isset($_SESSION['login'])): ?>
				<th scope="col" class="text-right"></th>
			<?php endif; ?>
		</tr>
		</thead>
		<tbody>
		<?php $idx = 0; ?>
		<?php foreach ($content['tasks'] as $row): ?>
			<?php $idx++; ?>
			<tr class="row-item" data-id="<?=$row->id?>">
				<td class="text-center"><strong><?=$row->name?></strong></td>
				<td class="text-center"><?=$row->email?></td>
				<td>
					<?=$row->description?>
					<?php if($row->edited_by_admin == 1): ?>
						<div class="text-muted">
							<small>
								<em>
									отредактировано администратором
								</em>
							</small>
						</div>
					<?php endif; ?>
				</td>
				<td class="text-center">
					<?php if($row->status): ?>
						<div class="text-success">выполнена</div>
					<?php else: ?>
						<div class="text-danger">не выполнена</div>
					<?php endif; ?>
				</td>
				<?php if(isset($_SESSION['login'])): ?>
					<td class="text-right">
						<button type="button" class="btn btn-danger btn-sm btn-edit my-1"
								data-tooltip="tooltip" title="Редактировать">
							<i class="fas fa-pencil-alt"></i>
						</button>
					</td>
				<?php endif; ?>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>

	<?php if($content['count'] > $content['perPage']): ?>
		<nav aria-label="Page navigation example">
			<ul class="pagination justify-content-center" data-page="<?=$content['page']?>">
				<li class="page-item<?php if($content['page'] == 1): ?> disabled<?php endif; ?>">
					<a class="page-link" href="/get/<?=$content['prev']?>">
						Назад
					</a>
				</li>
				<li class="page-item<?php if($content['page'] >= $content['pages']): ?> disabled<?php endif; ?>">
					<a class="page-link" href="/get/<?=$content['next']?>">Вперёд</a>
				</li>
			</ul>
		</nav>
	<?php endif; ?>

<?php else: ?>
	<div class="alert alert-secondary mt-3">Записей не найдено</div>
<?php endif; ?>

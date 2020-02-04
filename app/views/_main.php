<form method="post" class="bg-warning mb-4 px-3 pt-3 task-add" id="form_members">
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

<?php if(!empty($content)): ?>
	<div class="output table-responsive">
		<table class="table table-striped table-bordered table-hover table-sm">
			<thead class="thead-dark">
			<tr>
				<th scope="col" class="text-center">#</th>
				<th scope="col">Имя</th>
				<th scope="col">Email</th>
				<th scope="col">Текст задачи</th>
				<th scope="col">Статус</th>
				<th scope="col" class="text-right"></th>
			</tr>
			</thead>
			<tbody>
			<?php $idx = 0; ?>
			<?php foreach ($content as $row): ?>
				<?php $idx++; ?>
				<tr class="row-item" data-id="<?=$row->id?>">
					<th scope="row" class="text-center"><?=$idx?></th>
					<td><strong><?=$row->name?></strong></td>
					<td><?=$row->email?></td>
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
					<td>
						<?php if($row->status): ?>
							<div class="text-success">выполнена</div>
						<?php else: ?>
							<div class="text-danger">не выполнена</div>
						<?php endif; ?>
					</td>
					<td class="text-right">
						<button type="button" class="btn btn-danger btn-sm btn-edit my-1"
						        data-tooltip="tooltip" title="Редактировать"><i class="fas fa-pencil-alt"></i></button>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php endif; ?>

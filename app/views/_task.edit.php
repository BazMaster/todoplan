<div class="modal-header">
	<h5 class="modal-title" id="editModalLabel">
		<i class="fas fa-pencil-alt"></i>
		Редактирование задачи
	</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<input type="hidden" name="id" value="<?=$task->id?>">
	<div>
		<b>Имя:</b> <?=$task->name?>
	</div>
	<div>
		<b>Email:</b> <?=$task->email?>
	</div>
	<hr>
	<div class="form-group">
		<label for="description_input"><b>Текст задачи</b></label>
		<textarea name="description" id="description_input" cols="30" rows="4"
		          class="form-control"><?=$task->description?></textarea>
	</div>
	<div class="form-group form-check">
		<input type="checkbox" name="status" value="1" class="form-check-input" id="status_input"
		       <?php if($task->status == 1): ?> checked<?php endif; ?>
		>
		<label class="form-check-label" for="status_input">Задача выполнена</label>
	</div>
	<button type="submit" class="btn btn-primary btn-block mb-3">Сохранить</button>
</div>

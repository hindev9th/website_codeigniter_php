<table class="table" >
	<thead>
	<tr>
		<td>ID</td>
		<td>Mã danh mục</td>
		<td>Tên danh mục</td>
		<td></td>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($data as $value) { ?>
		<tr class="sub-tb-row">
			<td>
				<div class="flag">
					<?= $value->id ?>
				</div>
			</td>
			<td>
				<a href="category/edit/<?= $value->id ?>" id="btn-edit" class="text-dark">
					<?= $value->ma_dm ?>
				</a>

			</td>
			<td>
				<a href="category/edit/<?= $value->id ?>" id="btn-edit" class="text-dark">
					<?= $value->ten_dm ?>
				</a>
			</td>
			<td class="text-center">
				<a href="category/edit/<?= $value->id ?>" id="btn-edit" class="btn btn-warning">Sửa</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>


<table class="table" >
	<thead>
	<tr>
		<td>ID</td>
		<td>Mã thương hiệu</td>
		<td>Tên thương hiệu</td>
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
					<?= $value->ma_th ?>
				</a>

			</td>
			<td>
				<a href="category/edit/<?= $value->id ?>" id="btn-edit" class="text-dark">
					<?= $value->ten_th ?>
				</a>
			</td>
			<td class="text-center">
				<a href="category/edit/<?= $value->id ?>" id="btn-edit" class="btn btn-warning">Sửa</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>

</table>

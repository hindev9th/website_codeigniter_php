<table class="table" >
	<thead>
	<tr>
		<td>ID</td>
		<td>Mã sản phẩm</td>
		<td>Tên sản phẩm</td>
		<td>ID danh mục</td>
		<td>ID thương hiệu</td>
		<td>Đánh giá</td>
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
				<a href="product/edit/<?= $value->id ?>" id="btn-edit" class="text-dark">
					<?= $value->ma_sp ?>
				</a>

			</td>
			<td>
				<a href="product/edit/<?= $value->id ?>" id="btn-edit" class="text-dark">
					<?= $value->ten_sp ?>
				</a>
			</td>
			<td>
				<a href="product/edit/<?= $value->id ?>" id="btn-edit" class="text-dark">
					<?= $value->id_dm ?>
				</a>
			</td>
			<td>
				<a href="product/edit/<?= $value->id ?>" id="btn-edit" class="text-dark">
					<?= $value->id_th ?>
				</a>
			</td>
			<td>
				<a href="product/edit/<?= $value->id ?>" id="btn-edit" class="text-dark">
					<?= $value->diem_danh_gia ?>
				</a>
			</td>
			<td class="text-center">
				<a href="product/edit/<?= $value->id ?>" id="btn-edit" class="btn btn-warning">Sửa</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>


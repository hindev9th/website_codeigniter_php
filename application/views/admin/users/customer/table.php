<table class="table" >
	<thead>
	<tr>
		<td>ID</td>
		<td>Anh</td>
		<td>Ho ten</td>
		<td>Gioi tinh</td>
		<td>Ngay sinh</td>
		<td>So dien thoai</td>
		<td>Email</td>
		<td>Username</td>
		<td>Password</td>
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
				<a href="customer/edit/<?= $value->id ?>" id="btn-edit" class="text-dark">
					<img src="<?=base_url()?>pub/upload/img/avt/<?= $value->anh ?>" class=" rounded-circle border" width="50px">
				</a>

			</td>
			<td>
				<a href="admin/edit/<?= $value->id ?>" id="btn-edit" class="text-dark">
					<?= $value->ho_ten ?>
				</a>

			</td>
			<td>
				<?= $value->gioi_tinh ?>
			</td>
			<td>
				<?= $value->ngay_sinh ?>
			</td>
			<td>
				<?= $value->sdt ?>
			</td>
			<td>
				<a href="customer/edit/<?= $value->id ?>" id="btn-edit" class="text-dark">
					<?= $value->email ?>
				</a>
			</td>
			<td>
				<?= $value->password ?>
			</td>
			<td>
				<?= $value->dia_chi ?>
			</td>
			<td class="text-center">
				<a href="customer/edit/<?= $value->id ?>" id="btn-edit" class="btn btn-warning">Sửa</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>

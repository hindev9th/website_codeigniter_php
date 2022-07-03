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
	<tfoot>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td class="text-center">
			<div id="xem_them">
				<?php
				if ($count > count($data)){
					?>
					<button class="btn btn-default" id="btn-xem-them">
						Xem them
					</button>
				<?php } ?>

			</div>
		</td>
	</tr>
	</tfoot>
</table>
<script>
	$(document).ready(function (){
		$('#btn-xem-them').click(function (){
			var	get_nb = $('.sub-tb-row').length;
			get_nb += 10;
			$.ajax({
				url: 'trademark/search',
				type: 'post',
				data:{
					max_data:get_nb
				},beforeSend: function(){
					$("#btn-xem-them").disable = true;
					$("#btn-xem-them").addClass("is-loading");
				}
				,success:function (data){
					$("#btn-xem-them").disable = false;
					$("#btn-xem-them").removeClass("is-loading");
					$('#table-data').html(data);
				}
			})
		});
	})
</script>

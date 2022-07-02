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
				<?= $value->ma_th ?>
			</td>
			<td>
				<?= $value->ten_th ?>
			</td>
			<td class="text-center">
				<a href="trademark/edit" class="btn btn-warning">Sửa</a>
				<a href="trademark/delete" class="btn btn-danger">Xóa</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
	<tfoot>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td class="text-right">
			<button class="btn btn-default" id="btn-xem-them">
				Xem them
			</button>
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
				},success:function (data){
					$('#table-data').html(data);
				}
			})
		});
		$('#btn-xem-nb').click(function (){
			var	get_nb = $('.sub-tb-row').length;
			alert(get_nb);
		});

	})
</script>

$(document).ready(function (){
	var	url = document.URL;


	$('#input-search').keyup(function (){
		if ($(this).val().length > 1){
			$.ajax({
				url: url + '/search',
				type: 'post',
				data:{
					search:$(this).val()
				},success:function (data){
					$('#table-data').html(data);
				}
			})
		}
		if ($(this).val().length < 1){
			$.ajax({
				url: url + '/search',
				type: 'post',
				data:{
					search:$(this).val()
				},success:function (data){
					$('#table-data').html(data);
				}
			})
		}
	});

	$('#btn-search').click(function (){
		$.ajax({
			url: url + '/search',
			type: 'post',
			data:{
				search:$(this).val()
			},success:function (data){
				$('#table-data').html(data);
			}
		})
	});

	$('#btn-xem-them').click(function (){
		var	get_nb = $('.sub-tb-row').length;
		get_nb += 10;
		$.ajax({
			url: url + '/search',
			type: 'post',
			data:{
				max_data:get_nb
			},success:function (data){
				$('#table-data').html(data);
			}
		})
	});

	$('#btn-refresh').click(function (){
		$.ajax({
			url: url + '/search',
			type: 'post',
			success:function (data){
				$('#table-data').html(data);
			}
		})
	});

})

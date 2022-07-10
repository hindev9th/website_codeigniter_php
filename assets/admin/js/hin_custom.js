
$(document).ready(function (){
	var	url = document.URL;

	$('#btn-show-mTa').click(function (){
		$('#fr-fa-chevron-mTa').toggleClass("fa-chevron-up");
		$('#sub-cart-mTa').slideToggle();
	});

	$('#btn-show-img').click(function (){
		$('#fr-fa-chevron-image').toggleClass("fa-chevron-up");
		$('#sub-cart-image').slideToggle();
	});

	$('#btn-show-loai').click(function (){
		$('#fr-fa-chevron-loai').toggleClass("fa-chevron-up");
		$('#sub-cart-loai').slideToggle();
	});


	$(".sub-item-btn").click(function (){
		$('.wrapper').addClass("is-loading")
	});

	$("#btn-them,#btn-delete,#btn-back,#btn-edit").click(function (){
		$('.wrapper').addClass("is-loading")
	})

	$('#input-search').keyup(function (){
		if ($(this).val().length > 1){
			$.ajax({
				url: url + '/search',
				type: 'post',
				data:{
					search:$(this).val()
				},beforeSend: function(){
					$(".card-body").addClass("is-loading")
				},success:function (data){
					$(".card-body").removeClass("is-loading")
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
				},beforeSend: function(){
					$(".card-body").addClass("is-loading")
				},success:function (data){
					$(".card-body").removeClass("is-loading")
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
			},beforeSend: function(){
				$(".card-body").addClass("is-loading")
			},success:function (data){
				$(".card-body").removeClass("is-loading")
				$('#table-data').html(data);
			}
		})
	});

	$('button#btn-xem-them').click(function (){
		var	get_nb = $('.sub-tb-row').length;
		get_nb += 10;
		$.ajax({
			url: url + '/search',
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

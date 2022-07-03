
<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="text-white pb-2 fw-bold">Sản phẩm</h2>
						<h5 class="text-white op-7 mb-2">Thêm sản phẩm</h5>
					</div>
					<div class="ml-md-auto py-2 py-md-0">
						<a href="<?= base_url() ?>index.php/admin/product" class="btn btn-secondary btn-round" id="btn-back">Quay lại</a>
						<?php if(isset($data->id)) { ?>
						<a href="<?= base_url() ?>index.php/admin/product/delete/<?= $data->id ?>" class="btn btn-danger btn-round" id="btn-delete">Xóa</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="page-inner mt--5">
			<div class="row row-card-no-pd">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="card-head-row card-tools-still-right">
								<h4 class="card-title">Thông tin</h4>
							</div>
						</div>
						<div class="card-body">
							<form action="<?= base_url() ?>index.php/admin/product/save" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-4"></div>
									<div class="col-md-4">
										<div class="table-responsive table-hover table-sales" id="table-data">
											<input type="hidden" name="id" value="<?= isset($data->id) ? $data->id : '' ?>">
											<label for="ma_dm" class="mb-0" >Mã sản phẩm</label><span class="text-danger">*</span>
											<input type="text" name="ma_sp" id="ma_sp" value="<?= isset($data->ma_sp) ? $data->ma_sp : '' ?>" placeholder="Mã sản phẩm" class="form-control">
											<label for="ten_dm" class="mt-2 mb-0" >Tên sản phẩm</label><span class="text-danger">*</span>
											<input type="text" name="ten_sp" id="ten_sp" value="<?= isset($data->ten_sp) ? $data->ten_sp : '' ?>" placeholder="Tên sản phẩm" class="form-control">
											<label for="id_dm" class="mt-2 mb-0" >Danh mục</label><span class="text-danger">*</span>
											<select name="id_dm" id="id_dm" class="form-control">
												<option value="">Chọn một danh mục</option>
												<?php foreach ($danhMuc as $itemDM) { ?>
													<option value="<?=$itemDM->id?>" ><?=$itemDM->ten_dm?></option>
												<?php } ?>
											</select>
											<label for="id_th" class="mt-2 mb-0" >Thương hiệu</label><span class="text-danger">*</span>
											<select name="id_th" id="id_th" class="form-control">
												<option value="">Chọn một thương hiệu</option>
												<?php foreach ($thuongHieu as $itemTH) { ?>
													<option value="<?=$itemTH->id?>" ><?=$itemTH->ten_th?></option>
												<?php } ?>
											</select>
											<label for="mo_ta_ngan" class="mt-2 mb-0" >Mô tả ngắn</label>
											<textarea name="mo_ta_ngan" id="mo_ta_ngan" class="form-control"></textarea>
											<label for="so_luong" class="mt-2 mb-0" >Số lượng</label><span class="text-danger">*</span>
											<input type="number" name="so_luong" id="so_luong" value="" placeholder="Số lượng" class="form-control">
											<label for="gia" class="mt-2 mb-0" >Giá</label><span class="text-danger">*</span>
											<input type="text" name="gia" id="gia" value="" placeholder="Giá sản phẩm" class="form-control">
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-header">
										<div class="card-head-row card-tools-still-right">
											<h4 class="card-title">Mô tả</h4>
											<div class="card-tools">
												<a class="btn btn-icon btn-link btn-primary btn-xs " id="btn-show-mTa"><span class="fa fa-chevron-down" id="fr-fa-chevron-mTa"></span></a>
											</div>
										</div>
									</div>
									<div class="card-body" id="sub-cart-mTa">
										<textarea name="mo_ta" id="mo_ta" class="form-control"></textarea>
									</div>
								</div>
								<div class="card mt-5">
									<div class="card-header">
										<div class="card-head-row card-tools-still-right">
											<h4 class="card-title">Hình ảnh</h4>
											<div class="card-tools">
												<a class="btn btn-icon btn-link btn-primary btn-xs " id="btn-show-img"><span class="fa fa-chevron-down" id="fr-fa-chevron-image"></span></a>
											</div>
										</div>
									</div>
									<div class="card-body" id="sub-cart-image">
										<div class="image-upload">
											<label for="file-input">
												<img id="previewImg" src="<?=base_url()?>assets/img/image-preview.png" class="rounded border previewImg" width="200px" />
											</label>

											<input id="file-input" type="file" onchange="loadFile(event)" style="display: none;" />
										</div>
									</div>
								</div>
								<div class="card mt-5">
									<div class="card-header">
										<div class="card-head-row card-tools-still-right">
											<h4 class="card-title">Khác</h4>
											<div class="card-tools">
												<a class="btn btn-icon btn-link btn-primary btn-xs " id="btn-show-loai"><span class="fa fa-chevron-down" id="fr-fa-chevron-loai"></span></a>
											</div>
										</div>
									</div>
									<div class="card-body" id="sub-cart-loai">
										<div class="row">
											<div class="col-md" >
												<div class="row">
													<div class="col-md">
														<label for="col-loai">Loại</label>
													</div>
													<div class="col-md text-right">
														<a class="btn text-primary" id="btn-add-loai" title="Thêm một loại nữa"><i class="fa fa-plus-circle"></i></a>
													</div>
												</div>

												<div id="col-loai" class="border-top mb-5">
													<div class="row m-3" id="sub-col-loai">
														<div class="col-md-3"></div>
														<div class="col-md-6">
															<div class="row">
																<div class="col-md">
																	<input type="text" name="loai[]" placeholder="Loại" class="form-control">
																</div>
																<div class="col-md">
																	<input type="number" name="gia[]" placeholder="Giá" class="form-control">
																</div>
															</div>
														</div>
														<div class="col-md-3"></div>
													</div>
												</div>



												<div class="row">
													<div class="col-md">
														<label for="col-mau-sac">Màu sắc</label>
													</div>
													<div class="col-md text-right">
														<a class="btn text-primary" id="btn-add-mau" title="Thêm một màu nữa"><i class="fa fa-plus-circle"></i></a>
													</div>
												</div>
												<div id="col-mau-sac" class="border-top">
													<div class="row m-3">
														<div class="col-md-4"></div>
														<div class="col-md-4">
															<div class="row">
																<div class="col-md">
																	<input type="color" name="ma_mau[]" class="form-control form-control-color input-color-cus">
																</div>
																<div class="col-md">
																	<input type="text" name="ten_mau[]" placeholder="Tên màu" class="form-control">
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<input type="submit" class="btn btn-primary mt-5" id="btn-luu" value="Lưu">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view("include/footer"); ?>
</div>
<script>
	ClassicEditor
		.create( document.querySelector( '#mo_ta' ) )
		.then( editor => {
			console.log( editor );
		} )
		.catch( error => {
			console.error( error );
		} );

	$('#sub-cart-image').hide();
	$('#sub-cart-loai').hide();
	$('#sub-cart-mTa').hide();
	$('.active').removeClass("active");
	$('#btn-product, #sub-product-add').addClass("active");


	var loai_html = $('#col-loai').html();
	$('#btn-add-loai').click(function (){
		$('#col-loai').append(loai_html);
	});

	var mau_html = $('#col-mau-sac').html();
	$('#btn-add-mau').click(function (){
		$('#col-mau-sac').append(mau_html);
	});

	var img_html = $('#sub-cart-image').html();
	var loadFile = function(event) {
		var output = document.getElementById('previewImg');
		output.src = URL.createObjectURL(event.target.files[0]);

		$('#sub-cart-image').append(img_html);
	};
</script>


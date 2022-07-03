
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
											<div class="image-upload text-center">
												<label for="file-input">
													<img id="previewImg" src="<?=base_url()?>pub/upload/img/avt/avt-pr.jpg" class="rounded border previewImg" width="200px" />
												</label>
												<input type="hidden" name="anh" value="avt-pr.jpg">
												<input id="file-input" name="img_avt" type="file" onchange="loadFile(event)" style="display: none;" />
											</div>
											<label for="ma_dm" class="mb-0" >Mã sản phẩm</label><span class="text-danger">*</span>
											<input type="text" name="ma_sp" id="ma_sp" value="<?= isset($data->ma_sp) ? $data->ma_sp : '' ?>" placeholder="Mã sản phẩm" class="form-control">
											<label for="ten_dm" class="mt-2 mb-0" >Tên sản phẩm</label><span class="text-danger">*</span>
											<input type="text" name="ten_sp" id="ten_sp" value="<?= isset($data->ten_sp) ? $data->ten_sp : '' ?>" placeholder="Tên sản phẩm" class="form-control">
											<label for="id_dm" class="mt-2 mb-0" >Gioi tinh</label><span class="text-danger">*</span>
											<select name="id_dm" id="id_dm" class="form-control">
												<option value="">Chọn một gioi tinh</option>
													<option value="Nam" >Nam</option>
													<option value="Nu" >Nu</option>
													<option value="Khac" >Khac</option>

											</select>
											<label for="mo_ta_ngan" class="mt-2 mb-0" >Ngay sinh</label>
											<input type="date" name="ngay_sinh" id="ngay_sinh" class="form-control">
											<label for="mo_ta_ngan" class="mt-2 mb-0" >Mô tả ngắn</label>
											<textarea name="mo_ta_ngan" id="mo_ta_ngan" class="form-control"></textarea>
											<label for="so_luong" class="mt-2 mb-0" >Số lượng</label><span class="text-danger">*</span>
											<input type="number" name="so_luong" id="so_luong" value="" placeholder="Số lượng" class="form-control">
											<label for="gia" class="mt-2 mb-0" >Giá</label><span class="text-danger">*</span>
											<input type="text" name="gia" id="gia" value="" placeholder="Giá sản phẩm" class="form-control">
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
	$('.active').removeClass("active");
	$('#mn-users, #sub-users-admin').addClass("active");
</script>


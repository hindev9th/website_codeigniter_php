
<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="text-white pb-2 fw-bold">Thương hiệu</h2>
						<h5 class="text-white op-7 mb-2">Thêm thương hiệu</h5>
					</div>
					<div class="ml-md-auto py-2 py-md-0">
						<a href="<?= base_url() ?>index.php/admin/trademark" class="btn btn-secondary btn-round" id="btn-back">Quay lại</a>
					</div>
				</div>
			</div>
		</div>
		<div class="page-inner mt--5">
			<div class="row row-card-no-pd">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-4"></div>
								<div class="col-md-4">
									<div class="table-responsive table-hover table-sales" id="table-data">
										<form action="<?= base_url() ?>index.php/admin/trademark/save" method="post">
											<input type="hidden" name="id" value="<?= isset($data->id) ? $data->id : '' ?>">
											<label for="ma_th" class="mb-0" >Mã thương hiệu</label>
											<input type="text" name="ma_th" id="ma_th" value="<?= isset($data->ma_th) ? $data->ma_th : '' ?>" placeholder="Mã thương hiệu" class="form-control">
											<label for="ten_th" class="mt-2 mb-0" >Tên thương hiệu</label>
											<input type="text" name="ten_th" id="ten_th" value="<?= isset($data->ten_th) ? $data->ten_th : '' ?>" placeholder="Tên thương hiệu" class="form-control">
											<input type="submit" class="btn btn-primary mt-2" value="Lưu">
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view("include/footer"); ?>
</div>
<script>
	$('#home-page').removeClass("active");
	$('#sub-danh-muc, #danh-muc').addClass("active");
</script>


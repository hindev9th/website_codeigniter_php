
<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="text-white pb-2 fw-bold">Danh mục</h2>
						<h5 class="text-white op-7 mb-2">Thêm danh mục</h5>
					</div>
					<div class="ml-md-auto py-2 py-md-0">
						<a href="<?= base_url() ?>index.php/admin/category" class="btn btn-secondary btn-round" id="btn-back">Quay lại</a>
						<?php if(isset($data->id)) { ?>
						<a href="<?= base_url() ?>index.php/admin/category/delete/<?= $data->id ?>" class="btn btn-danger btn-round" id="btn-delete">Xóa</a>
						<?php } ?>
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
										<form action="<?= base_url() ?>index.php/admin/category/save" method="post">
											<input type="hidden" name="id" value="<?= isset($data->id) ? $data->id : '' ?>">
											<label for="ma_dm" class="mb-0" >Mã danh mục</label>
											<input type="text" name="ma_dm" id="ma_dm" value="<?= isset($data->ma_dm) ? $data->ma_dm : '' ?>" placeholder="Mã danh mục" class="form-control">
											<label for="ten_dm" class="mt-2 mb-0" >Tên danh mục</label>
											<input type="text" name="ten_dm" id="ten_dm" value="<?= isset($data->ten_dm) ? $data->ten_dm : '' ?>" placeholder="Tên danh mục" class="form-control">
											<input type="submit" class="btn btn-primary mt-2" id="btn-luu" value="Lưu">
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


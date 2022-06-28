
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
						<a href="<?= base_url() ?>index.php/category" class="btn btn-secondary btn-round" id="btn-back">Quay lại</a>
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
										<form action="<?= base_url() ?>index.php/category/insert" method="post">
											<input type="hidden" name="id" value="<?= $data->id ?>">
											<label for="Ma_DM" class="mb-0">Mã danh mục</label>
											<input type="text" name="Ma_DM" id="Ma_DM" value="<?= $data->Ma_DM ?>" placeholder="Mã danh mục" class="form-control">
											<label for="Ten_DM" class="mt-2 mb-0">Tên danh mục</label>
											<input type="text" name="Ten_DM" id="Ten_DM" value="<?= $data->Ten_DM ?>" placeholder="Tên danh mục" class="form-control">
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

</script>

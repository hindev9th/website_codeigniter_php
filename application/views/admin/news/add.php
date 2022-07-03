
<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="text-white pb-2 fw-bold">Tin tức</h2>
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
								<div class="col-md-12">
									<div class="table-responsive table-hover table-sales" id="table-data">
										<form action="<?= base_url() ?>index.php/admin/news/save" method="post">
											<input type="file" name="anh" class="fa-file-image">
											<input type="hidden" name="id" value="<?= isset($data->id) ? $data->id : '' ?>">
											<input type="hidden" name="id_user" id="id_user" value="<?= isset($data->id_user) ? $data->id_user : '' ?>" placeholder="Mã danh mục" class="form-control">
											<label for="ten_dm" class="mt-2 mb-0" >Tiêu đề</label>
											<input type="text" name="tieu_de" id="tieu_de" value="<?= isset($data->tieu_de) ? $data->tieu_de : '' ?>" placeholder="Tiêu đề" class="form-control">
											<label for="noi_dung" class="mt-2 mb-0" >Nội dung</label>
											<div name="noi_dung" id="noi_dung" cols="30" rows="10" class="form-control"><?= isset($data->noi_dung) ? $data->noi_dung : '' ?></div>
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

<script>
	$(document).ready(function (){


		ClassicEditor
			.create( document.querySelector( '#noi_dung' )
			.catch( error => {
				console.error( error );
			} );


	})
</script>

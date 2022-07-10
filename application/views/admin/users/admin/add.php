<?php $adm = $this->session->userdata('admin'); ?>
<div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Bạn có thật sự muốn xóa người này ra khỏi danh sách quản trị trang ?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Cảnh báo !
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
				<a  href="<?= base_url() ?>admin/users/admin/delete/<?= isset($data->id) ? $data->id : '' ?>" type="button" class="btn btn-primary" id="btn-delete">Đồng ý</a>
			</div>
		</div>
	</div>
</div>
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
						<a href="<?= base_url() ?>admin/users/admin" class="btn btn-secondary btn-round" id="btn-back">Quay lại</a>
						<?php if(isset($data->id) && $data->id != $adm['id']) { ?>
							<button type="button" class="btn btn-danger btn-round"  data-toggle="modal" data-target="#delete-modal" >Xóa</button>
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
							<form action="<?= base_url() ?>admin/users/admin/save" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-4"></div>
									<div class="col-md-4">
										<div class="table-responsive table-hover table-sales" id="table-data">
											<input type="hidden" name="id" value="<?= isset($data->id) ? $data->id : '' ?>">
											<div class="image-upload text-center">
												<label for="file-input">
													<img id="previewImg" src="<?=base_url()?>pub/upload/img/avt/<?= isset($data->anh) && !empty($data->anh) ? $data->anh : 'avt-pr.jpg' ?>" class="rounded border previewImg" width="200px" />
												</label>
												<input type="hidden" name="anh" value="<?= isset($data->anh) && !empty($data->anh) ? $data->anh : 'avt-pr.jpg' ?>">
												<input id="file-input" name="img_avt" type="file"  onchange="loadFile(event)" style="display: none;" />
											</div>
											<label for="ho_ten" class="mb-0" >Họ tên</label><span class="text-danger">*</span>
											<input type="text" name="ho_ten" id="ho_ten" required value="<?= isset($data->ho_ten) ? $data->ho_ten : '' ?>" placeholder="Họ và tên" class="form-control">
											<label for="id_dm" class="mt-2 mb-0" >Giới tinh</label>
											<select name="gioi_tinh" id="gioi_tinh" class="form-control">
													<option value="">Chọn một giới tinh</option>
													<option value="Nam" <?= isset($data->gioi_tinh) ? ( $data->gioi_tinh == 'Nam' ? 'selected' : '' ) : '' ?> >Nam</option>
													<option value="Nữ" <?= isset($data->gioi_tinh) ? ( $data->gioi_tinh == 'Nữ' ? 'selected' : '' ) : '' ?> >Nữ</option>
													<option value="Khác" <?= isset($data->gioi_tinh) ? ( $data->gioi_tinh == 'Khác' ? 'selected' : '' ) : '' ?> >Khác</option>
											</select>
											<label for="ngay_sinh" class="mt-2 mb-0" >Ngày sinh</label>
											<input type="date" name="ngay_sinh" id="ngay_sinh" value="<?= isset($data->ngay_sinh) ? $data->ngay_sinh : '' ?>" class="form-control">
											<label for="sdt" class="mt-2 mb-0" >Số điện thoại</label>
											<input type="number" name="sdt" id="sdt" value="<?= isset($data->sdt) ? $data->sdt : '' ?>" class="form-control">
											<label for="email" class="mt-2 mb-0" >Email</label>
											<input type="email" name="email" id="email" value="<?= isset($data->email) ? $data->email : '' ?>" placeholder="Email" class="form-control">
											<label for="username" class="mt-2 mb-0" >Tên đăng nhập</label><span class="text-danger">*</span>
											<input type="text" name="username" id="username" minlength="5" required value="<?= isset($data->username) ? $data->username : '' ?>" placeholder="Tên đăng nhập" class="form-control">
											<label for="password" class="mt-2 mb-0"  >Mật khẩu</label><span class="text-danger">*</span>
											<input type="password" name="password" minlength="5" id="password" required value="" placeholder="Mật khẩu" class="form-control">
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
	<?php $this->load->view("admin/include/footer"); ?>
</div>
<script>
	$('.active').removeClass("active");
	$('#mn-users, #sub-users-admin').addClass("active");

	var loadFile = function(event) {
		var output = document.getElementById('previewImg');
		output.src = URL.createObjectURL(event.target.files[0]);
	};
</script>


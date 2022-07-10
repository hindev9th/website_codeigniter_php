
<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="text-white pb-2 fw-bold">Người dùng</h2>
						<h5 class="text-white op-7 mb-2">Danh sách khách hàng</h5>
					</div>
					<div class="ml-md-auto py-2 py-md-0">
						<a href="<?= base_url() ?>admin/users/customer/add" class="btn btn-secondary btn-round" id="btn-them">Thêm khách hàng</a>
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
								<div class="collapse" id="search-nav">
									<form class="navbar-left navbar-form nav-search mr-md-3">
										<div class="input-group">
											<div class="input-group-prepend">
												<button type="submit" class="btn btn-search pr-1" id="btn-search">
													<i class="fa fa-search search-icon"></i>
												</button>
											</div>
											<input type="text" id="input-search" placeholder="Search ..." class="form-control">
										</div>
									</form>
								</div>
								<div class="card-tools">
									<button class="btn btn-icon btn-link btn-primary btn-xs btn-refresh-card" id="btn-refresh"><span class="fa fa-sync-alt"></span></button>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive table-hover table-sales" id="table-data">
										<table class="table" >
											<thead>
											<tr>
												<td>ID</td>
												<td>Anh</td>
												<td>Ho ten</td>
												<td>Gioi tinh</td>
												<td>Ngay sinh</td>
												<td>So dien thoai</td>
												<td>Email</td>
												<td>Password</td>
												<td>Địa chỉ</td>
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
														<a href="customer/edit/<?= $value->id ?>" id="btn-edit" class="text-dark">
															<img src="<?=base_url()?>pub/upload/img/avt/<?= $value->anh ?>" class=" rounded-circle border" width="50px">
														</a>

													</td>
													<td>
														<a href="customer/edit/<?= $value->id ?>" id="btn-edit" class="text-dark">
															<?= $value->ho_ten ?>
														</a>

													</td>
													<td>
															<?= $value->gioi_tinh ?>
													</td>
													<td>
															<?= $value->ngay_sinh ?>
													</td>
													<td>
															<?= $value->sdt ?>
													</td>
													<td>
														<a href="customer/edit/<?= $value->id ?>" id="btn-edit" class="text-dark">
															<?= $value->email ?>
														</a>
													</td>
													<td>
															<?= $value->password ?>
													</td>
													<td>
														<?= $value->dia_chi ?>
													</td>
													<td class="text-center">
														<a href="customer/edit/<?= $value->id ?>" id="btn-edit" class="btn btn-warning">Sửa</a>
													</td>
												</tr>
											<?php } ?>
											</tbody>
										</table>
									</div>
									<div class="text-center">
										<?php
										if ($count > count($data)){
											?>
											<button class="btn btn-default" id="btn-xem-them">
												Xem them
											</button>
										<?php } ?>
									</div>
								</div>
							</div>
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
	$('#mn-users, #sub-users-customer').addClass("active");


	$('#btn-xem-them').click(function (){
		var	get_nb = $('.sub-tb-row').length;
		if (<?=$count?> > get_nb){
			$(this).show();
		}else {
			$(this).hide();
		}
	});
</script>

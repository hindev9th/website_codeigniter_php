
<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="text-white pb-2 fw-bold">Thương hiệu</h2>
						<h5 class="text-white op-7 mb-2">Danh sách thương hiệu</h5>
					</div>
					<div class="ml-md-auto py-2 py-md-0">
						<a href="trademark/add" class="btn btn-secondary btn-round">Thêm thương hiệu</a>
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
													<td>Mã thương hiệu</td>
													<td>Tên thương hiệu</td>
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
														<?= $value->ma_th ?>
													</td>
													<td>
														<?= $value->ten_th ?>
													</td>
													<td class="text-center">
														<a href="trademark/edit/<?= $value->id ?>" class="btn btn-warning">Sửa</a>
														<a href="trademark/delete/<?= $value->id ?>" class="btn btn-danger">Xóa</a>

													</td>
												</tr>
												<?php } ?>
											</tbody>
											<tfoot>
												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td class="text-right">
														<button class="btn btn-default" id="btn-xem-them">
															Xem them
														</button>
													</td>
												</tr>
											</tfoot>
										</table>
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
	$('#sub-thuong-hieu, #danh-muc').addClass("active");
</script>

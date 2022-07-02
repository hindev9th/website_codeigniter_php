
<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="text-white pb-2 fw-bold">Tin tức</h2>
						<h5 class="text-white op-7 mb-2">Danh sách các tin tức</h5>
					</div>
					<div class="ml-md-auto py-2 py-md-0">
						<a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
						<a href="#" class="btn btn-secondary btn-round">Add Customer</a>
					</div>
				</div>
			</div>
		</div>
		<div class="page-inner mt--5">
			<div class="row">
				<div class="col-md-12">
					<div class="card full-height">
						<div class="card-header">
							<div class="card-head-row">
								<div class="card-title">
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
								</div>
								<div class="card-tools">
									<ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
										<li class="nav-item">
											<a class="nav-link" id="pills-today" data-toggle="pill" href="#pills-today" role="tab" aria-selected="true">Today</a>
										</li>
										<li class="nav-item">
											<a class="nav-link active" id="pills-week" data-toggle="pill" href="#pills-week" role="tab" aria-selected="false">Week</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="pills-month" data-toggle="pill" href="#pills-month" role="tab" aria-selected="false">Month</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="card-body">

							<?php
							foreach ($data as $value){
							?>
							<div class="d-flex">
								<div class="avatar">
									<span class="avatar-title rounded-circle border border-white bg-info">J</span>
								</div>
								<div class="flex-1 ml-3 pt-1">
									<a href="<?= base_url() ?>index.php/admin/news/read/<?= $value->id ?>" class="text-dark">
										<h6 class="text-uppercase fw-bold mb-1"><?= $value->tieu_de ?></h6>
									</a>
									<span class="text-muted" id="news-mo-ta-ngan"><?= $value->noi_dung ?> </span>
								</div>
								<div class="float-right pt-1">
									<small class="text-muted"><?= $value->thoi_gian ?></small>
								</div>
							</div>
							<div class="separator-dashed"></div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view("include/footer"); ?>

</div>
<script>
	$('#sub-news-btn, #tin-tuc').Class("active");

	$('#home-page').removeClass("active");
	$('#sub-danh-muc, #danh-muc').removeClass("active");
	$('#sub-thuong-hieu, #danh-muc').removeClass("active");

</script>

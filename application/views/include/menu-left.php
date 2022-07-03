
<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2">
					<img src="<?=base_url() ?>assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
				</div>
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									Nguyen hien
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
					</a>
					<div class="clearfix"></div>

					<div class="collapse in" id="collapseExample">
						<ul class="nav">
							<li>
								<a href="#profile">
									<span class="link-collapse">Thông tin</span>
								</a>
							</li>
							<li>
								<a href="#edit">
									<span class="link-collapse">Sửa thông tin</span>
								</a>
							</li>
							<li>
								<a href="#settings">
									<span class="link-collapse">Đăng xuất</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<ul class="nav nav-primary">
				<li class="nav-item active" id="home-page">
					<a  href="<?=base_url() ?>index.php/admin/home">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
					<h4 class="text-section">Các thành phần</h4>
				</li>
				<li class="nav-item" id="danh-muc">
					<a data-toggle="collapse" href="#base">
						<i class="fas fa-layer-group"></i>
						<p>Danh mục</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="base">
						<ul class="nav nav-collapse">
							<li class="sub-item-btn" id="sub-danh-muc">
								<a href="<?=base_url() ?>index.php/admin/category">
									<span class="sub-item">Danh mục</span>
								</a>
							</li>
							<li class="sub-item-btn" id="sub-thuong-hieu">
								<a href="<?=base_url() ?>index.php/admin/trademark">
									<span class="sub-item">Thương hiệu</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item" id="btn-product">
					<a data-toggle="collapse" href="#product">
						<i class="fas fa-th-list"></i>
						<p>Sản phẩm</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="product">
						<ul class="nav nav-collapse">
							<li class="sub-item-btn" id="sub-product-add">
								<a href="<?= base_url() ?>index.php/admin/product/add">
									<span class="sub-item">Thêm sản phẩm</span>
								</a>
							</li>
							<li class="sub-item-btn" id="sub-product">
								<a href="<?= base_url() ?>index.php/admin/product">
									<span class="sub-item">Sản phẩm</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item" id="gio_hang">
					<a data-toggle="collapse" href="#order">
						<i class="fa fa-shopping-cart"></i>
						<p>Đơn hàng</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="order">
						<ul class="nav nav-collapse">
							<li class="sub-them-tin">
								<a href="<?= base_url() ?>index.php/admin/news/add">
									<span class="sub-item">Đơn hàng mới</span>
								</a>
							</li>
							<li class="sub-them-tin">
								<a href="<?= base_url() ?>index.php/admin/news/add">
									<span class="sub-item">Đơn hàng trả lại</span>
								</a>
							</li>
							<li class="sub-them-tin">
								<a href="<?= base_url() ?>index.php/admin/news/add">
									<span class="sub-item">Đơn hàng hoàn thành</span>
								</a>
							</li>
							<li class="sub-them-tin">
								<a href="<?= base_url() ?>index.php/admin/news/add">
									<span class="sub-item">Đơn hàng hủy</span>
								</a>
							</li>

							<li class="sub-them-tin">
								<a href="<?= base_url() ?>index.php/admin/news/add">
									<span class="sub-item">Đơn hàng</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item" id="customer">
					<a data-toggle="collapse" href="#users">
						<i class="fa fa-users"></i>
						<p>Người dùng</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="users">
						<ul class="nav nav-collapse">
							<li class="sub-them-tin">
								<a href="<?= base_url() ?>index.php/admin/news/add">
									<span class="sub-item">Quản trị</span>
								</a>
							</li>
							<li class="sub-them-tin">
								<a href="<?= base_url() ?>index.php/admin/news/add">
									<span class="sub-item">Khách hàng</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#tables">
						<i class="fas fa-table"></i>
						<p>Banner</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="tables">
						<ul class="nav nav-collapse">
							<li>
								<a href="tables/tables.html">
									<span class="sub-item">Thêm banner</span>
								</a>
							</li>
							<li>
								<a href="tables/datatables.html">
									<span class="sub-item">Banner</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="" href="#">
						<i class="fas fa-bars"></i>
						<p>Kho</p>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- End Sidebar -->


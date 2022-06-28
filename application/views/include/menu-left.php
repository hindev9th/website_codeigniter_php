
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
					<a  href="<?=base_url() ?>index.php/home">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
					<h4 class="text-section">Cac thanh phan</h4>
				</li>
				<li class="nav-item" id="danh-muc">
					<a data-toggle="collapse" href="#base">
						<i class="fas fa-layer-group"></i>
						<p>Danh mục</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="base">
						<ul class="nav nav-collapse">
							<li id="sub-danh-muc">
								<a href="<?=base_url() ?>index.php/category">
									<span class="sub-item">Danh sách danh mục</span>
								</a>
							</li>
							<li id="sub-thuong-hieu">
								<a href="<?=base_url() ?>index.php/trademark">
									<span class="sub-item">Danh sách thương hiệu</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#sidebarLayouts">
						<i class="fas fa-th-list"></i>
						<p>Sản phẩm</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="sidebarLayouts">
						<ul class="nav nav-collapse">
							<li class="sub-item-btn">
								<a href="sidebar-style-1.html">
									<span class="sub-item">Thêm sản phẩm</span>
								</a>
							</li>
							<li class="sub-item-btn">
								<a href="overlay-sidebar.html">
									<span class="sub-item">Danh sách sản phẩm</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#forms">
						<i class="fas fa-pen-square"></i>
						<p>Tin tức</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="forms">
						<ul class="nav nav-collapse">
							<li class="sub-item-btn">
								<a href="forms/forms.html">
									<span class="sub-item">Viết bài</span>
								</a>
							</li>
							<li class="sub-item-btn">
								<a href="forms/forms.html">
									<span class="sub-item">Danh sách tin tức</span>
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
									<span class="sub-item">Danh sách banner</span>
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


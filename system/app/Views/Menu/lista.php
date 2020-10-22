<?php header_admin($data)?>

<!-- page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url()?>dashboard">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url()?>menu">Menu</a></li>
						<li class="breadcrumb-item">Lista</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
	<!-- Main content -->
	<section class="content">

		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<!-- Default box -->
					<div class="row listUserMenu">
						<div class="col-md-4">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title text-center">
										William Enrique <strong class="">(Administrador)</strong>
									</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<ul>
										<li>titulo menu</li>
										<ul>
											<li>Consectetur </li>
											<li>Integer molestie </li>
											<li>Facilisis in pretium </li>
										</ul>
									</ul>
									<ul>
										<li>titulo menu 2</li>
										<ul>
											<li>Phasellus </li>
											<li>Purus </li>
											<li>Vestibulum laoreet </li>
											<li>Ac tristique </li>
										</ul>
									</ul>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>

					</div>
					<!-- /.card -->
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
	<?php footer_admin($data)?>
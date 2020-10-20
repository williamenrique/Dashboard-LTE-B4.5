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
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item">Menu</li>
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
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
								<button class="btn btn-success btn-sm"><i class="fas fa-plus mr-2"></i>Menu</button>
							</h3>
						</div>

						<div class="card-body">
							<form>
								<div class="form-row">
									<div class="col-md-4 mb-3">
										<label for="listUser">Seleccione Usuario</label>
										<select id="listUser" data-live-search="true" name="listUser" class="form-control"
											data-style="btn-outline-primary" data-size="5">
											<option value="">Seleccione</option>
										</select>
									</div>
									<div class="col-md-3 mb-3">
										<label for="listMenu">Seleccione Menu</label>
										<select id="listMenu" data-live-search="true" name="listMenu" class="form-control"
											data-style="btn-outline-primary" data-size="5">
											<option value="">Seleccione</option>
										</select>
									</div>
									<div class="col-md-4 mb-3">
										<label for="listRolId">Seleccione Submenu</label>
										<div class="form-group">
											<div class="custom-control custom-checkbox">
												<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
												<label for="customCheckbox1" class="custom-control-label">Custom Checkbox</label>
											</div>
											<div class="custom-control custom-checkbox">
												<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
												<label for="customCheckbox1" class="custom-control-label">Custom Checkbox</label>
											</div>
											<div class="custom-control custom-checkbox">
												<input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
												<label for="customCheckbox1" class="custom-control-label">Custom Checkbox</label>
											</div>
										</div>
									</div>
								</div>
						</div>
						</form>
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						Footer
					</div>
					<!-- /.card-footer-->
				</div>
				<!-- /.card -->
			</div>
		</div>
</div>
</section>
<!-- /.content -->
<?php footer_admin($data)?>
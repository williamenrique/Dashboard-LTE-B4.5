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
								Tabla de asignacion de menu
							</h3>
						</div>

						<div class="card-body">
							<div class="card">
								<div class="card-header p-2">
									<ul class="nav nav-pills">
										<li class="nav-item"><a class="nav-link active" href="#menuSub" data-toggle="tab">Asociar menu</a>
										</li>
										<li class="nav-item"><a class="nav-link" href="#asignar" data-toggle="tab">Asignar
												menu</a></li>
										<li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
									</ul>
								</div><!-- /.card-header -->
								<div class="card-body">
									<div class="tab-content">
										<div class="active tab-pane" id="menuSub">
											<form class="formMenu">
												<div class="form-row">
													<div class="col-md-3 mb-3">
														<label for="listMenu">Seleccione Menu</label>
														<!-- <select id="listMenu" data-live-search="true" name="listMenu" class="form-control"
															data-style="btn-outline-primary" data-size="5">
															<option value="">Seleccione</option>
														</select> -->
														<div class="form-group listMenu">

														</div>
													</div>
													<div class="col-md-4 mb-3">
														<label for="listRolId">Seleccione Submenu</label>
														<div class="form-group listSubmenu">

														</div>
													</div>
												</div>
												<div class="form-row">
													<button type="submit" id="btnActionForm" class="btn btn-primary"><span
															id="btnText">Guardar</span></button>
												</div>
											</form>
										</div>
										<!-- /.tab-pane -->
										<div class="tab-pane" id="asignar">
											<form class="formMenuAsignar">
												<div class="form-row">
													<div class="col-md-4 mb-3">
														<label for="listrol">Seleccione Cargo</label>
														<!-- <select id="listrol" data-live-search="true" name="listrol" class="form-control"
															data-style="btn-outline-primary" data-size="5">
															<option value="">Seleccione</option>
														</select> -->
														<div class="form-group listRol">

														</div>
													</div>
													<div class="col-md-3 mb-3">
														<label for="listMenuAsignar">Seleccione Menu</label>
														<!-- <select id="listMenuAsignar" data-live-search="true" name="listMenuAsignar"
															class="form-control" data-style="btn-outline-primary" data-size="5">
															<option>Seleccione</option>
														</select> -->
														<!-- cargar los radios con los menu -->
														<div class="form-group listMenuAsignar">

														</div>
													</div>
													<div class="col-md-4 mb-3 listSubmenuAsignar">

													</div>
												</div>
												<div class="form-row">
													<button type="submit" id="btnActionForm" class="btn btn-primary"><span
															id="btnText">Asignar</span></button>
												</div>
											</form>
										</div>
										<!-- /.tab-pane -->

										<div class="tab-pane" id="settings">
											<form class="form-horizontal">
												<div class="form-group row">
													<label for="inputName" class="col-sm-2 col-form-label">Name</label>
													<div class="col-sm-10">
														<input type="email" class="form-control" id="inputName" placeholder="Name">
													</div>
												</div>
												<div class="form-group row">
													<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
													<div class="col-sm-10">
														<input type="email" class="form-control" id="inputEmail" placeholder="Email">
													</div>
												</div>
												<div class="form-group row">
													<label for="inputName2" class="col-sm-2 col-form-label">Name</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="inputName2" placeholder="Name">
													</div>
												</div>
												<div class="form-group row">
													<label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
													<div class="col-sm-10">
														<textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
													</div>
												</div>
												<div class="form-group row">
													<label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="inputSkills" placeholder="Skills">
													</div>
												</div>
												<div class="form-group row">
													<div class="offset-sm-2 col-sm-10">
														<div class="checkbox">
															<label>
																<input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
															</label>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<div class="offset-sm-2 col-sm-10">
														<button type="submit" class="btn btn-danger">Submit</button>
													</div>
												</div>
											</form>
										</div>
										<!-- /.tab-pane -->
									</div>
									<!-- /.tab-content -->
								</div><!-- /.card-body -->
							</div>




						</div>
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
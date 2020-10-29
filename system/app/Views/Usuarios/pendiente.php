<?php header_admin($data);
getModal('modalUsuario',$data);
?>

<!-- page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header mr-4">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url()?>dashboard">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url()?>usuarios">Usuarios</a></li>
						<li class="breadcrumb-item">Pendientes</li>
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
							<h5 class="text-muted">Lista de usuarios de alta en el sistema</h5>
						</div>
					</div>
				</div>

				<div class="card border-success mb-3 colRol getRoles" style="max-width: 18rem;">
					<div class="card-header bg-transparent border-success" id="title-card">
						<h6 class="card-text text-success">Seleccione un rol para <span id="title-card">we21</span></h6>
					</div>
					<div class="card-body text-success">
						<form id="formRolAsignar">
							<input type="hidden" name="txtIdUser" id="txtIdUser" value="">
							<div class="form-group">
							</div>
						</form>
					</div>
					<div class="card-footer bg-transparent border-success">
						<button type="submit" class="btn btn-primary mt-2">Asignar</button>
					</div>
				</div>

				<!-- <div class="row">
					<div class="col-sm-4 colRol">
						<form id="formRolAsignar">
							<input type="hidden" name="txtIdUser" id="txtIdUser" value="">
							<div class="form-group getRoles">
								<div class="card bg-success">
									<div class="card-header"> Usuario : we21</div>
									<div class="card-body">
										<div class="custom-control custom-radio">
											<input class="custom-control-input" type="radio" id="" name="radioRol" value="">
											<label for="" class="custom-control-label">radio 1</label>
										</div>
										<div class="custom-control custom-radio">
											<input class="custom-control-input" type="radio" id="" name="radioRol" value="">
											<label for="" class="custom-control-label">radio 1</label>
										</div>
										<div class="custom-control custom-radio">
											<input class="custom-control-input" type="radio" id="" name="radioRol" value="">
											<label for="" class="custom-control-label">radio 1</label>
										</div>
									</div>
								</div>
						</form>
					</div>
				</div> -->

			</div>

			<div class=" row box_user_pend">

			</div>
		</div>
	</section>

	<!-- /.content -->
	<?php footer_admin($data)?>
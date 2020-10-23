<?php header_admin($data);
// getModal('modalRoles',$data);?>

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
						<li class="breadcrumb-item">Roles</li>
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
							<h3>
								<!-- <button type="button" class="btn btn-primary btn-sm mr-3" onclick="openModal()">
									<i class="fas fa-plus"></i>
									Agregar
								</button> -->
							</h3>
							<form id="formRol">
								<input type="hidden" name="idRol" id="idRol" value="">
								<span id="title">Agrege un nuevo rol con descripcion y estatus</span>
								<div class="form-row align-items-center">
									<div class="col-sm-3 my-1">
										<label class="sr-only" for="inlineFormInputName">Nombre del Rol</label>
										<input type="text" class="form-control" placeholder="Ingrese rol" id="txtnombre" name="txtnombre"
											onkeypress="return soloLetras(event);">
									</div>
									<div class="col-sm-6 my-1">
										<label class="sr-only" for="inlineFormInputName">Breve descripcion</label>
										<input type="text" class="form-control" placeholder="Breve descripcion" id="txtdescripcion"
											name="txtdescripcion">
									</div>
									<div class="col-auto my-1 statusRol">
										<div class="form-check ml-2">
											<input class="form-check-input" type="radio" name="radioStatus" id="status1" value="2" checked>
											<label class="form-check-label" for="status2">Inactivo</label>
										</div>
										<div class="form-check ml-2">
											<input class="form-check-input" type="radio" name="radioStatus" id="status2" value="1">
											<label class="form-check-label" for="status1">Activo</label>
										</div>
									</div>
									<div class="col-auto my-1">
										<button type="submit" id="btnActionForm" class="btn btn-primary btn-sm ml-3"> <i
												class="fas fa-plus"></i><span id="btnText">Agregar</span></button>
									</div>
								</div>
							</form>
							<!-- <form id="formRol">
								<span>Agrege un nuevo rol con descripcion y estatus</span>
								<div class="form-row align-items-center">
									<div class="col-sm-2">
										<input type="text" class="form-control" placeholder="Ingrese rol" id="txtnombre" name="txtnombre"
											onkeypress="return soloLetras(event);">
									</div>
									<div class="col-sm-6">
										<input type="text" class="form-control" placeholder="Breve descripcion" id="txtdescripcion"
											name="txtdescripcion">
									</div>
									<div class="col-sm-4">
										<div class="form-check ml-3">
											<input class="form-check-input" type="radio" name="selectStatus" id="status1" value="1">
											<label class="form-check-label" for="status1">Activo</label>
										</div>
										<div class="form-check ml-3">
											<input class="form-check-input" type="radio" name="selectStatus" id="status2" value="2">
											<label class="form-check-label" for="status2">Inactivo</label>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="col-sm-2">
										<button type="submit" class="btn btn-primary mb-2"> <i class="fas fa-plus"></i>Agregar</button>
									</div>
								</div>
							</form> -->
						</div>

						<div class="card-body">
							<table class="table stripe hover nowrap table-sm" id="tableRol">
								<thead>
									<tr>
										<th scope="col">ID</th>
										<th scope="col">Rol</th>
										<th scope="col">Descripcion</th>
										<th scope="col">Status</th>
										<th scope="col">Acciones</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
					<!-- /.card -->
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
	<?php footer_admin($data)?>
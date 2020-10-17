<nav class="mt-2">
	<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		<!-- Add icons to the links using the .nav-icon class
				with font-awesome or any other icon font library -->
		<!-- <li class="nav-item dashboard">
			<a href="<?= base_url()?>dashboard" class="nav-link dashboard-link">
				<i class="nav-icon fas fa-tachometer-alt"></i>
				<p>Dashboard</p>
			</a>
		</li>
		<li class="nav-item user-menu ">
			<a href="#" class="nav-link usuarios">
				<i class="nav-icon fas fa-user"></i>
				<p>Usuarios<i class="right fas fa-angle-left"></i></p>
			</a>
			<ul class="nav nav-treeview ">
				<li class="nav-item link-roles">
					<a href="<?= base_url()?>roles" class="nav-link ">
						<i class="far fa-circle nav-icon"></i>
						<p>Roles</p>
					</a>
				</li>
				<li class="nav-item link-user">
					<a href="<?= base_url()?>usuarios" class="nav-link ">
						<i class="far fa-circle nav-icon"></i>
						<p>Usuarios</p>
					</a>
				</li>
				<li class="nav-item link-alta">
					<a href="<?= base_url()?>usuarios/alta" class="nav-link ">
						<i class="far fa-circle nav-icon"></i>
						<p>Usuarios de alta</p>
					</a>
				</li>
			</ul>
		</li> -->

		<?php echo cargar_menu($_SESSION['userData']['user_nick'])?>

		<li class="nav-item ">
			<a href="pages/widgets.html" class="nav-link">
				<i class="nav-icon fas fa-th"></i>
				<p>
					Widgets
					<span class="right badge badge-danger">New</span>
				</p>
			</a>
		</li>

	</ul>
</nav>
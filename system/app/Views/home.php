	<?= header_admin($data)?>
	<div class="container mt-5 text-center">
		<h2 clas="">Framework v1.0</h2>
		<h3>Realizado con PHP MVC</h3>
		<p><a href="dashboard">Panel de Control</a></p>
		<?= $_SESSION['login']?>
	</div>
	<?= footer_admin($data)?>
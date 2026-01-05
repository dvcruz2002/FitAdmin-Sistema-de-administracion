<div class="crearPlan">
	<nav class="nav-main" id="nav-main">
		<div class="contenedor nav-menu">
			<img src="build/img/logo.png" class="nav-brand" />
			<div class="nav-ref">
				<a href="/inicio-admin">Inicio</a>
				<a href="/mostrar-planes">Mostrar planes</a>
                <a href="/crear-plan">Crear planes</a>
				<a href="/modificar-plan">Modificar planes</a>
				<a href="/eliminar-plan">Eliminar planes</a>
			</div>
			<div class="inicioSesion">
				<a href="/logout">Cerrar sesión</a>
			</div>
		</div>
	</nav>

	<div class="crearC">
		<div class="cuadroC">
			<h2>Eliminar plan</h2>

			<?php
        		include_once __DIR__ . "/../templates/alertas.php"
    		?>

			<form class="formulario" method="POST" action="/eliminar-plan">

				<label for="cantida">Id del plan a eliminar:</label>
				<input class="input" type="number" min="0" max="1000000" name="id">

				<input class="button" id="submit_button" type="submit" value="Eliminar plan" />
			</form>
		</div>
	</div>
</div>
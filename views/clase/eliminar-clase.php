<div class="crearPlan">
	<nav class="nav-main" id="nav-main">
		<div class="contenedor nav-menu">
			<img src="build/img/logo.png" class="nav-brand" />
			<div class="nav-ref">
				<a href="/inicio-admin">Inicio</a>
				<a href="/mostrar-clases">Mostrar clases</a>
                <a href="/crear-clase">Crear clases</a>
				<a href="/modificar-clase">Modificar clases</a>
				<a href="/eliminar-clase">Eliminar clases</a>
            </div>
			<div class="inicioSesion">
				<a href="/logout">Cerrar sesión</a>
			</div>
		</div>
	</nav>

	<div class="crearC">
		<div class="cuadroC">
			<h2>Eliminar clase</h2>

			<?php
        		include_once __DIR__ . "/../templates/alertas.php"
    		?>

			<form class="formulario" method="POST" action="/eliminar-clase">

				<label for="cantida">Id de la clase a eliminar:</label>
				<input class="input" type="number" min="0" max="1000000" name="id">

				<input class="button" id="submit_button" type="submit" value="Eliminar clase" />
			</form>
		</div>
	</div>
</div>
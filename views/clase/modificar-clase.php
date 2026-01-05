<div class="modificarClase">
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
			<h2>Modificar clase</h2>

			<?php
        		include_once __DIR__ . "/../templates/alertas.php"
    		?>

			<form class="formulario" method="POST" action="/modificar-clase">

                <label for="claseId">Indique el ID de la clase a modificar:</label>
                <input class="input" type="text" name="id" required>

				<label for="fecha">Nueva fecha:</label>
				<input  class="input" type="date" name="fecha" id="fecha" required>

				<label for="hora">Nueva hora:</label>
				<input  class="input" type="time" name="hora" id="hora" required>

				<label for="lugar">Nuevo lugar:</label>
				<select  class="input" name="lugar" id="lugar" required>
					<option value="Salón A">Salón A</option>
					<option value="Salón B">Salón B</option>
					<option value="Salón C">Salón C</option>
					<option value="Salón D">Salón D</option>
					<option value="Salón E">Salón E</option>
					<option value="Salón F">Salón F</option>
				</select>

				<input class="button" id="submit_button" type="submit" value="Modificar clase" />
			</form>
		</div>
	</div>
</div>
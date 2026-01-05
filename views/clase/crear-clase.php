<div class="crearClase">
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
			<h2>Crear clase</h2>

			<?php
        		include_once __DIR__ . "/../templates/alertas.php"
    		?>

			<form class="formulario" method="POST" action="/crear-clase">

				<label for="nombre">Clase:</label>
				<select class="input" name="nombre" id="nombre_clase">
					<option value="yoga">Yoga</option>
					<option value="zumba">Zumba</option>
					<option value="spinning">Spinning</option>
					<option value="body_pump">Body Pump</option>
				</select>

				<label for="instructor">Instructor:</label>
				<select  class="input" name="instructor" id="instructor">
					<option value="Juan Pérez">Juan Pérez</option>
					<option value="María Rodríguez">María Rodríguez</option>
					<option value="Carlos Gómez">Carlos Gómez</option>
					<option value="Ana López">Ana López</option>
				</select>

				<label for="fecha">Fecha:</label>
				<input  class="input" type="date" name="fecha" id="fecha">

				<label for="hora">Hora:</label>
				<input  class="input" type="time" name="hora" id="hora">

				<label for="lugar">Lugar:</label>
				<select  class="input" name="lugar" id="lugar">
					<option value="Salón A">Salón A</option>
					<option value="Salón B">Salón B</option>
					<option value="Salón C">Salón C</option>
					<option value="Salón D">Salón D</option>
					<option value="Salón E">Salón E</option>
					<option value="Salón F">Salón F</option>
				</select>
				<input class="button" id="submit_button" type="submit" value="Crear clase" />
			</form>
		</div>
	</div>
</div>
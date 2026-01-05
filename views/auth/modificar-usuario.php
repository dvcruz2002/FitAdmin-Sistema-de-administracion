<div class="crearPlan">   
    <nav class="nav-main" id="nav-main">
		<div class="contenedor nav-menu">
			<img src="build/img/logo.png" class="nav-brand" />
			<div class="nav-ref">
					<a href="/inicio-user">Inicio</a>
                    <a href="/modificar-usuario">Modificar usuario</a>
					<a href="/mostrar-planes-u">Planes y suscripciones</a>
					<a href="/mostrar-clases-u">Clases</a>
				</div>
			<div class="inicioSesion">
				<a href="/logout">Cerrar sesión</a>
			</div>
		</div>
	</nav>

    <div class="crearC">
		<div class="cuadroC">
			<h2>Modificar Usuario</h2>

			<?php
        		include_once __DIR__ . "/../templates/alertas.php"
    		?>

			<form class="formulario" method="POST" action="/modificar-usuario">

                <label for="email">Modificar correo:</label>
                <input class="input" type="email"  name="email">

				<input class="button" id="submit_button" type="submit" value="Modificar usuario" />
			</form>
		</div>
	</div>
</div>
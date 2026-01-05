<div class="crearPlan">
	<nav class="nav-main" id="nav-main">
		<div class="contenedor nav-menu">
			<img src="build/img/logo.png" class="nav-brand" />
			<div class="nav-ref">
				<a href="/inicio-user">Inicio</a>
				<a href="/mostrar-planes-u">Mostrar planes</a>
				<a href="/realizar-suscripcion">Realizar suscripción</a>
				<a href="/eliminar-suscripcion">Eliminar suscripción</a>

            </div>
			<div class="inicioSesion">
				<a href="/logout">Cerrar sesión</a>
			</div>
		</div>
	</nav>

	<div class="crearC">
		<div class="cuadroC">
			<h2>¡Atención! Eliminar suscripción</h2>

			<?php
        		include_once __DIR__ . "/../templates/alertas.php"
    		?>

			<form class="formulario" method="POST" action="/eliminar-suscripcion">

				<p>Eliminar tu suscripción significa perder acceso al gimnasio, tu perfil y datos. <br> Esta acción es irreversible, pero puedes crear una nueva suscripción cuando desees.</p>

				<input class="button" id="submit_button" type="submit" value="Eliminar suscripción" />
			</form>
		</div>
	</div>
</div>
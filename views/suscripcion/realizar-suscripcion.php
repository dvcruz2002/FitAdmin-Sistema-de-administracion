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
			<h2>Realizar suscripción</h2>

			<?php
        		include_once __DIR__ . "/../templates/alertas.php"
    		?>

			<form class="formulario" method="POST" action="/realizar-suscripcion">

				<label for="planId">Plan:</label>
				<select class="input" name="planId" id="planId">
					<?php foreach ($planes as $plan): ?>
						<?php if ($plan->id == 18) continue; ?>
						<option value="<?php echo $plan->id; ?>"><?php echo $plan->nombre; ?></option>
					<?php endforeach; ?>
				</select>

				<label for="meses">Cantidad de meses:</label>
				<input class="input" type="number" min="0" max="12" name="meses">

				<input class="button" id="submit_button" type="submit" value="Realizar suscripción" />
			</form>
		</div>
	</div>

</div>
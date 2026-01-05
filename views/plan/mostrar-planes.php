<div class="mostrar-planes">
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
			<h2>Planes</h2>
			<table>
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Cantidad de clases al mes</th>
						<th>Precio</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($planes as $plan): ?>
					<tr>
						<td><?php echo $plan->id; ?></td>
						<td><?php echo $plan->nombre; ?></td>
						<td><?php echo $plan->cantidad; ?></td>
						<td>$<?php echo $plan->precio; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
    </div>
</div>



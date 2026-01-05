<div class="mostrar-planes">
    <nav class="nav-main" id="nav-main">
        <div class="contenedor nav-menu">
            <img src="build/img/logo.png" class="nav-brand" />
            <div class="nav-ref">
				<a href="/inicio-user">Inicio</a>
				<a href="/mostrar-clases-u">Mostrar clases</a>
				<a href="/inscribir-clase">Inscribir clases</a>
                <a href="/cancelar-clase">Cancelar clases</a>
            </div>
            <div class="inicioSesion">
                <a href="/logout">Cerrar sesión</a>
            </div>
        </div>
    </nav>
    
    <div class="crearC">
		<div class="cuadroC">
			<h2>Clases</h2>
			<table>
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Instructor</th>
						<th>Fecha</th>
                        <th>Hora</th>
                        <th>Lugar</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($clases as $clase): ?>
					<tr>
						<td><?php echo $clase->id; ?></td>
						<td><?php echo $clase->nombre; ?></td>
						<td><?php echo $clase->instructor; ?></td>
						<td><?php echo $clase->fecha; ?></td>
                        <td><?php echo $clase->hora; ?></td>
                        <td><?php echo $clase->lugar; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
    </div>
</div>

<div class="mostrar-planes">
    <nav class="nav-main" id="nav-main">
        <div class="contenedor nav-menu">
            <img src="build/img/logo.png" class="nav-brand" />
            <div class="nav-ref">
				<a href="/inicio-user">Inicio</a>
				<a href="/mostrar-clases-u">Mostrar clases</a>
                <a href="/mostrar-mis-clases">Mis clases</a>
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
			<h2>Mis clases</h2>
			<table>
				<thead>
					<tr>
						<th>ID</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($inscritas as $inscrita): ?>
					<tr>
						<td><?php echo $inscrita->id; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
    </div>
</div>
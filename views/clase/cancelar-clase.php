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
			<h2>Cancelar clase</h2>

			<?php
        		include_once __DIR__ . "/../templates/alertas.php"
    		?>

			<form class="formulario" method="POST" action="/cancelar-clase">

				<label for="cantida">Id de la clase a cancelar:</label>
				<input class="input" type="number" min="0" max="1000000" name="claseId">

				<input class="button" id="submit_button" type="submit" value="Cancelar clase" />
			</form>
		</div>
	</div>

</div>
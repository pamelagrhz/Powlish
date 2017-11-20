<?php 
	require_once('controllers/dbconnection.php');
	require_once('models/pais.php');

	$conn = db_connect();
	$paises = array();

	$sql = "SELECT id, nombre FROM paises";
	$result = $conn->query($sql);

	if ( $result->num_rows > 0 ) {
	    // output data of each row
	    //row devuelve filas, llamamos de sql a id y nombre
		while( $row = $result->fetch_assoc() ) {
			$pais = new Pais($row["id"], $row["nombre"]);
			array_push($paises, $pais);
		}
	}
	$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Polwish</title>
	<link rel="shortcut icon" type="image/png" href="logo.png" />
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="assets/materialize/css/materialize.min.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="assets/css/styles.css"/>

	<!--menu en pantalla grande -->
	<nav>
		<div class="nav-wrapper indigo lighten-2">
			<a href="#!" class="brand-logo"><i class="material-icons">weekend</i>Polwish</a>
			<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
			<ul class="right hide-on-med-and-down">

				<li>			
					<a href="#slide-out" data-activates="slide-out" class="button-collapse">Mi perfil</i></a>
				</li>
				<li><a href="">Inicio</a></li>
				<li><a class="modal-trigger" href="#modal4">Membresías</a></li>
				<li><a class="modal-trigger" href="#modal3">Más de Polwish</a></li>
				<li class="nav-profile">
					<a href="#">
						<i href="#slide-out" data-activates="slide-out" class="button-collapse"><i class="material-icons circle grey ">person</i>Mi Perfil</i>
					</a>
				</li>
				<li><a class="dropdown-button" href="#!" data-activates="login-dropdown">Iniciar<i class="material-icons right">arrow_drop_down</i></a></li>
			</ul>
		</div>
	</nav>

	<ul id="login-dropdown" class="dropdown-content">
		<li><a class="modal-trigger" href="#modal-signup">Registrate</a></li>
		<li><a class="modal-trigger" href="#modal-login">Inicia sesión</a></li>
	</ul>

	<!--mi perfil-->
	<ul id="slide-out" class="side-nav">
		<li><div class="user-view">
			<div class="background">
				<img src="images/office.jpg">
			</div>
			<a href="#!user"><img class="circle" src="assets/images/user.jpg"></a>
			<a href="#!name"><span class="black-text name">Nombre</span></a>
			<a href="#!email"><span class="black-text email">correo@gmail.com</span></a>
		</div></li>
		<li><div class="divider"></div></li>
		<li><a href="index2.html">Inicio</a></li>
		<li><a class="modal-trigger" href="#modal3">Más de Polwish</a></li>
		<li><div class="divider"></div></li>

		<li><a class="modal-trigger" href="#modal4" "><i class="material-icons">cloud</i>Mi Membresía</a></li>
		<li><div class="divider"></div></li>
		<li><a href="http://www.youtube.com/"target="_blank"">youtube</a></li>
		<li><a href="http://www.spotify.com/"target="_blank"">spotify</a></li>
		<li><a class="modal-trigger" href="#modal-signup">Registrate</a></li>
		<li><a  class="modal-trigger" href="#modal-login">Iniciar Sesión</a></li>

		<li><div class="divider"></div></li>
		<li><a class="waves-effect" onclick="Materialize.toast('Esta pagina está en construcción, por favor intentalo más tarde', 4000)">Editar Mi Perfil</a></li>
	</ul>

	<!-- Modal Structure -->
	<div id="modal-signup" class="modal modal-fixed-footer modal-min">
		<div class="modal-content">
			<h4 class="purple-text text-darken-4">Registro</h4>
			<div class="row">
				<form class="col s12" action="controllers/registro.php" method="POST">
					<div class="row">
						<div class="input-field col s12">
							<input name="nombre" id="first_name" type="text" class="validate">
							<label for="first_name">Nombre</label>
						</div>
						<div class="input-field col s12 m6">
							<input name="apellido_paterno" id="last_name" type="text" class="validate">
							<label for="last_name">Apellido Paterno</label>
						</div>
						<div class="input-field col s12 m6">
							<input name="apellido_materno" id="last_name2" type="text" class="validate">
							<label for="last_name2">Apellido Materno</label>
						</div>
						<div class="col s12"><h5 class="grey-text text-darken-2">Sexo</h5></div>
						<div class="col s6">
							<input name="sexo" type="radio" id="sexo1" value="1" />
							<label for="sexo1">Mujer</label>
						</div>
						<div class="col s6">
							<input name="sexo" type="radio" id="sexo2" value="2" />
							<label for="sexo2">Hombre</label>
						</div>
						<div class="row"></div>

						<div class="input-field col s12">
							<input name="fecha_nacimiento" id="nacimiento" type="text" class="datepicker">
							<label for="nacimiento">Fecha de nacimiento</label>
						</div>
						<div class="input-field col s12">
							<select name="pais">
								<option value="" disabled selected>Elige un país</option>
								<?php 
									for( $i = 0 ; $i < count($paises) ; $i++ ) { 
										echo "<option value='" . $paises[$i]->getId() . "'>" . $paises[$i]->getNombre() . "</option>";
									} 
								?>
							</select>
							<label>País</label>
						</div>
						<div class="input-field col s12">
							<input name="telefono" id="telefono" type="text" class="validate">
							<label for="telefono">Telefono</label>
						</div>
						<div class="input-field col s12">
							<input name="email" id="email" type="email" class="validate">
							<label for="email">Email</label>
						</div>
						<div class="input-field col s12">
							<input name="contrasenia" id="password" type="password" class="validate">
							<label for="password">Password</label>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat red-text">Cancelar</a>
			<a href="#!" class="modal-action modal-close waves-effect waves-green btn purple">Continuar</a>
		</div>
	</div>
	
	<!-- Modal3 Structure -->
	<div id="modal3" class="modal modal-fixed-footer">
		<div class="modal-content">
			<h4 class="purple-text center-align">Más de nosotros</h4>
			<div class="divider"></div>
			<br>
			<h5 class="purple-text center-align">Descripcion de polwish</h5>
			<p>Powlish S.A. de C.V.dedicada al ramo del entretenimiento y streaming de 
			contenidos multimedia en internet. </p>
			<br>
			<div class="divider"></div>
			<br>
			<h5 class="purple-text center-align">Problematica de la empresa</h5>
			<p>Powlish S.A. de C.V. requiere de soluciones web para poder implementar por primera vez una 
			aplicacion web con la que puedan los usuarios hacer uso de los servicios que ofrece la empresa. </p>
			<br>
			<div class="divider"></div>
			<br>
			<h5 class="purple-text center-align">Objetivos</h5>
			<p>Nuestro principal objetivo es satisfacer a nuestros usuarios con la mas alta calidad en contenidos multimedia. </p>
			<p></p>
			<p>Que los usuarios  puedan disfrutar de cualquier musica, video, pelicula o serie de television en el momento que lo deseen sin mayores contratiempos. </p>
			<p></p>
			<p>Que el usuario pueda visualizar la aplicacion ya sea desde el su telefono celular o desde su laptop.  </p>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat purple-text">Aceptar</a>
		</div>
	</div>

	<!-- Modal4 Structure -->
	<div id="modal4" class="modal">
		<div class="modal-content">
			<h4 class="purple-text center-align">Membresías</h4>
			<table>
				<thead>
					<tr>
						<th>Tipo de membresía</th>
						<th>Tiempo</th>
						<th>Precio</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Normal</td>
						<td>1 mes</td>
						<td>$50.00</td>
					</tr>
					<tr>
						<td>Plus</td>
						<td>6 meses</td>
						<td>$250.00</td>
					</tr>
					<tr>
						<td>Pro</td>
						<td>1 año</td>
						<td>$400.00</td>
					</tr>
				</tbody>
			</table>

		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat red-text">Cancelar</a>
			<a  href="#!" class="btn purple modal-action modal-close waves-effect waves-light" onclick="Materialize.toast('Esta pagina está en construcción, por favor intentalo más tarde', 4000)">Comprar mi membresía</a>
		</div>
	</div>
	<!-- Image parallax Structure  ic_weekend_white_24dp_1x.png -->

	<div class="parallax-container">
		<div class="col 1 intro_container">
			<i class="c large material-icons enter-align">weekend</i>
			<p><h1>Powlish</h1></p>
			<div class="parallax"><img src="assets/images/marmol.jpg"></div>
		</div>
	</div>

	<!--Musica-->
	<div>
		<div class="carousel carousel-slider center" data-indicators="true">
			<div class="carousel-fixed-item center">
			</div>
			<div class="carousel-item white-text bg-img" href="https://www.spotify.com/" style="background-image: url('assets/images/musica.jpg');">
				<h1 class=" white-text  valign-wrapper">Música</h1>
				<p class="white-text  valign-wrapper">Descubre musica nueva y poco conocida.</p>
			</div>
		</div>
	</div>
	<br>
	<!--VIDEO YOUNG T-->
	<div class="row">
		<div class="col s12 l8">
			<div class=" video-container" >
				<iframe width="100%" height="200" src="https://www.youtube.com/embed/1PUl8_gIDRE" frameborder="0" gesture="media" allowfullscreen></iframe>
			</div>
		</div>
		<div class="col s12 l4">
			<div class="card">
				<div class="card-image">
					<img src="assets/images/yt.jpg">
					<span class="card-title">Young Tender</span>
				</div>
				<div class="card-content">
					<p>Conoce a YOUNG TENDER, una banda Mexicana de Monterrey que trae un estilo muy fresco del genero Sad Disco, Estos Mexicanos comienzan a darse a conocer;Te recomendamos su discografia "Necios"y "Massachusetts EP"</p>
				</div>
				<div class="card-action">
					<a href="https://youngtenderlife.bandcamp.com/"target="_blank"">Página Oficial de Young Tender</a>
				</div>
			</div>
		</div>
	</div>

	<!--VIDEO METRONOMY-->
	<div class="row">
		<div class="col s12 l4">
			<div class="card">
				<div class="card-image">
					<img src="assets/images/mt.jpg">
					<span class="card-title">Metronomy</span>
				</div>
				<div class="card-content">
					<p>
						Metronomy es un grupo Inglés del genero New wave, Electropop, Wonky pop, Experimental INDIETRONICA poco conocido desde el año 1999;Un grupo con un estilo fresco e inovador, te recomendamos su disco "Holiphonic".
					</p>
				</div>
				<div class="card-action">
					<a href="http://www.metronomy.co.uk/"target="_blank"">Página Oficial de Metronomy</a>
				</div>
			</div>
		</div>
		<div class="col s12 l8">
			<div class=" video-container" >
				<iframe width="100%" height="480" src="https://www.youtube.com/embed/sFrNsSnk8GM" frameborder="0" gesture="media" allowfullscreen></iframe>
			</div>
		</div>
	</div>

	<!--Fin musica-->
	<!--Peliculas-->
	<div>
		<div class="carousel carousel-slider center" data-indicators="true">
			<div class="carousel-fixed-item center">

			</div>
			<div class="carousel-item  white-text bg-img" style="background-image: url('assets/images/peli.jpg');">
				<h1 class="white-text  valign-wrapper">Series y Peliculas</h1>
				<p class="white-text valign-wrapper ">Descubre nuevas series y peliculas que sean de tu agrado!!!</p>

			</div>
		</div>
	</div>

	<br>
	<!--coco-->
	<div class="row">
		<div class="col s12 l8">
			<div class="video-container">
				<iframe width="100%" height="480" src="https://www.youtube.com/embed/awzWdtCezDo" frameborder="0" gesture="media" allowfullscreen>
				</iframe>
			</div>
		</div>
		<div class="col s12 l4">
			<div class="card">
				<div class="card-image">
					<img src="assets/images/coco.jpg">
					<span class="card-title">coco</span>
				</div>
				<div class="card-content">
					<p>
						A pesar de la incomprensible prohibición de la música desde hace varias generaciones en su familia, Miguel sueña con convertirse en un músico consagrado, como su ídolo Ernesto de la Cruz. Desesperado por probar su talento, Miguel se encuentra en la impresionante y colorida Tierra de los Muertos como resultado de una misteriosa cadena de eventos. 
					</p>
				</div>
			</div>
		</div>
	</div>

	<!--RObot-->
	<div class="row">
		<div class="col s12 l4">
			<div class="card">
				<div class="card-image">
					<img src="assets/images/robot.jpg">
					<span class="card-title">Mr Robot</span>
				</div>
				<div class="card-content">
					<p>
						La serie sigue a Elliot Alderson (Rami Malek), un joven hacker que sufre de fobia social, depresión clínica y delirios, trabaja como ingeniero de seguridad informática y usa sus habilidades para proteger a las personas por las que se preocupa. Elliot es reclutado por Mr. Robot (Christian Slater), el misterioso líder de un grupo de hacktivistas llamado fsociety, que quiere destruir a poderosos empresarios de multinacionales que están manejando el mundo.
					</p>
				</div>
			</div>
		</div>
		<div class="col s12 l8">
			<div class=" video-container" >
				<iframe width="100%" height="480" src="https://www.youtube.com/embed/xIBiJ_SzJTA" frameborder="0" gesture="media" allowfullscreen></iframe>
			</div>
		</div>
	</div>

	<!--Fin pelis-->
	<!--videos-->
	<div>
		<div class="carousel carousel-slider center" data-indicators="true">
			<div class="carousel-fixed-item center">
			</div>
			<div class="carousel-item white-text bg-img" style="background-image: url('assets/images/videoo.jpg');">
				<h1 class="black-text  valign-wrapper">Videos</h1>
				<p class="black-text  valign-wrapper">Aqui podras ver todos los videos de musica que estan de moda. </p>
			</div>
		</div>
	</div>

	<br>
	<!--VIDEO Musica-->
	<div class="row">
		<div class="col s12 l8">
			<div class="video-container">
				<iframe width="100%" height="480" src="https://www.youtube.com/embed/TyHvyGVs42U" frameborder="0" gesture="media" allowfullscreen></iframe>
			</div>
		</div>
		<div class="col s12 l4">
			<div class="card">
				<div class="card-image">
					<img src="assets/images/yot.png">
					<span class="card-title black-text">No eres tu, soy yo</span>
				</div>
				<div class="card-content">
					<p>Desde su ultima creación "Despacito" Luis fonsi ha causado gran polemica, y más ahora que se presenta con la
					famosa cantante estadounidence DEMI LOVATO quien posee una hermosa voz a quien ahora vemos cantando en español!!!!, escuchalos aqui en powlish.</p>
				</div>
			</div>
		</div>
	</div>

	<!--VIDEO Noticias-->
	<div class="row">
		<div class="col s12 l4">
			<div class="card">
				<div class="card-image">
					<img src="assets/images/pr.png">
					<span class="black-text card-title">El pulso de la republica</span>
				</div>
				<div class="card-content">
					<p>
						Enterate de las ultimas noticias con el famoso "CHUMY BEBE" de una forma entretenida, divertida, pero sobre todo
						con la opinion del pueblo.					
					</p>
				</div>
				<div class="card-action">
					<a href="http://www.metronomy.co.uk/"target="_blank"">Tienda</a>
				</div>
			</div>
		</div>
		<div class="col s12 l8">
			<div class="video-container">
				<iframe width="100%" height="480" src="https://www.youtube.com/embed/dorDNyAFycA" frameborder="0" gesture="media" allowfullscreen></iframe>
			</div>
		</div>
	</div>
	<!--Fin videos-->

	<div class="row">
		<div class="parallax-container min">
			<div class="col s12 intro_container">
				<i class="medium material-icons enter-align">weekend</i>
				<p><h1>Gracias por visitar Powlish</h1></p>
			</div>

			<div class="parallax"><img src="assets/images/sol.png"></div>
		</div>
	</div>

	<footer class="page-footer blue lighten-2">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h5 class="white-text">Contactanos</h5>
					<p class="grey-text text-lighten-4">Siguenos en nuestras redes sociales"</p>
				</div>
				<div class="col l4 offset-l2 s12">
					<ul>
						<li><a class="grey-text text-lighten-3" href="https://www.facebook.com/"target="_blank"">Facebook</a></li>
						<li><a class="grey-text text-lighten-3" href="https://twiter.com/"target="_blank"">Twitter</a></li>
						<li><a class="grey-text text-lighten-3" href="https://www.instagram.com/"target="_blank"">Instagram</a></li>
						<li><a class="grey-text text-lighten-3" href="http://www.spotify.com/"target="_blank"">Spotify</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				© 2017 UPIICSA Instituto Politecnico Nacional
			</div>
		</div>
	</footer>

	<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="assets/materialize/js/materialize.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins.js"></script>
</body>
</html>
<?php 
	require_once('dbconnection.php');
	require_once('../models/usuario.php');
	require_once('cookies.php');
	require_once('redirect.php'); // Para redireccionar el navegador a otra pagina

	$conn = db_connect();
	$cookie = new UserCookie();

	$nombre = $_POST["nombre"];
	$apat = $_POST["apellido_paterno"];
	$amat = $_POST["apellido_materno"];
	$sexo = $_POST["sexo"];
	$tel = $_POST["telefono"];
	$fnacimiento = $_POST["fecha_nacimiento"];
	$email = $_POST["email"];
	$contrasenia = $_POST["contrasenia"];
	$pais = $_POST["pais"];

	$sql = "CALL SP_Registrar_Usuario('" . $nombre . "','" . $apat . "','" . $amat . "'," . $sexo . ",'" . $tel . "','" . $fnacimiento . "','" . $email . "','" . $contrasenia . "'," . $pais . ")";

	$result = $conn->query($sql);
	$usuario = null;

	if ( $result->num_rows > 0 ) {
		while( $row = $result->fetch_assoc() ) {
			if ( $row["codigo"] == -1 ) {
				echo "FAIL";
			} else {
				$usuario = new Usuario($row["Id"], $nombre, $apat, $amat, $sexo, $tel, $fnacimiento, $email, $row["Pais"]);
				$cookie->setCookie($usuario);
				echo "OK";
			}
			break;
		}
	}
	$conn->close();
	redirect('../index.php');

?>
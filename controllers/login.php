<?php 
	require_once('dbconnection.php');
	require_once(__DIR__.'/../models/usuario.php');
	require_once('cookies.php');
	require_once('redirect.php'); // Para redireccionar el navegador a otra pagina

	$conn = db_connect();
	$cookie = new UserCookie();

	$email = $_POST["email"];
	$contrasenia = $_POST["password"];

	$sql = "CALL SP_Login('" . $email . "','" . $contrasenia . "')";

	$result = $conn->query($sql);
	$usuario = null;

	if ( $result->num_rows > 0 ) {
		while( $row = $result->fetch_assoc() ) {
			if ( $row["codigo"] == -1 ) {
				echo "FAIL: " . $row["mensaje"];
				break;
			} else {
				$usuario = new Usuario($row["Id"], $row["Nombre"], $row["Apellido_Paterno"], $row["Apellido_Materno"], $row["Sexo"], $row["Telefono"], $row["Fecha_Nacimiento"], $row["Email"], $row["Pais"]);
				$cookie->setCookie($usuario);
				echo "OK";
				redirect('../index.php');
				break;
			}
		}
	}
	$conn->close();

?>
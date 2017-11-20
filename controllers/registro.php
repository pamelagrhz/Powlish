<?php 
	require_once('dbconnection.php');
	require_once('../models/usuario.php');

	$conn = db_connect();

	$sql = "CALL SP_Registrar_Usuario(" . $_POST["nombre"] . "," . $_POST["apellido_paterno"] . "," . $_POST["apellido_materno"] . "," . $_POST["sexo"] . "," . $_POST["telefono"] . "," . $_POST["fecha_nacimiento"] . "," . $_POST["email"] . "," . $_POST["contrasenia"] . "," . $_POST["pais"] . ")";

	echo $conn->query($sql);

	if ( $conn->query($sql) === TRUE ) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

?>
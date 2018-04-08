<?php
	require_once('dbconnection.php');
	require_once('models/pais.php');

	function npais() {
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
		return $paises;
	}
?>
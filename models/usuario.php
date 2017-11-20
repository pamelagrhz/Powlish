<?php 
 /**
 * 
 */
 class Usuario
 {
 	private $id;
 	private $nombre;
 	private $apellido_paterno;
 	private $apellido_materno;
 	private $sexo;
 	private $telefono;
 	private $fecha_nacimiento;
 	private $email;
 	private $pais;

 	function __construct($id, $nombre, $apellido_paterno, $apellido_materno, $sexo, $telefono, $fecha_nacimiento, $email, $pais)
 	{
 		$this->id = $id;
 		$this->nombre = $nombre;
 		$this->apellido_paterno = $apellido_paterno;
 		$this->apellido_materno = $apellido_materno;
 		$this->sexo = $sexo;
 		$this->telefono = $telefono;
 		$this->fecha_nacimiento = $fecha_nacimiento;
 		$this->email = $email;
 		$this->pais = $pais;
 		# code...
 	}

 	public function setId($id) {
 		$this->id = $id;
 	}

 	public function getId() {
 		return $this->id;
 	}

 	public function setNombre($nombre) {
 		$this->nombre = $nombre;
 	}

 	public function getNombre() {
 		return $this->nombre;
 	}

 	public function setApellidoPaterno($apellido_paterno) {
 		$this->apellido_paterno = $apellido_paterno;
 	}

 	public function getApellidoPaterno() {
 		return $this->apellido_paterno;
 	}

	public function setApellidoMaterno($apellido_materno) {
 		$this->apellido_materno = $apellido_materno;
 	}

 	public function getApellidoMaterno() {
 		return $this->apellido_materno;
 	}

 	
 	public function setSexo($sexo) {
 		$this->sexo = $sexo;
 	}

 	public function getSexo() {
 		return $this->sexo;
 	}

 	
 	public function setTelefono($telefono) {
 		$this->telefono = $telefono;
 	}

 	public function getTelefono() {
 		return $this->telefono;
 	}

 	
 	public function setFechaNacimiento($fecha_nacimiento) {
 		$this->fecha_nacimiento = $fecha_nacimiento;
 	}

 	public function getFechaNacimiento() {
 		return $this->fecha_nacimiento;
 	}

 	
 	public function setEmail($email) {
 		$this->email = $email;
 	}

 	public function getEmail() {
 		return $this->email;
 	}

 	
 	public function setPais($pais) {
 		$this->pais = $pais;
 	}

 	public function getPais() {
 		return $this->pais;
 	}


 }
?>
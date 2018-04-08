<?php 
	//require_once('../models/usuario.php');
	require_once(__DIR__.'/../models/usuario.php');

	class UserCookie {
		private $cookie_name = "user";
		private $cookie_value;
		//private static $cookie_time = time() + (86400 * 30); // 86400 = 1 day

		public function setCookie($user) { // Este método recibe un objeto de la clase usuario
			// nombre_cookie, valor_cookie, tiempo_expiración, no_se;
			$newUser = null;
			$newUser->id = $user->getId();
			$newUser->nombre = $user->getNombre();
			$newUser->apellido_paterno = $user->getApellidoPaterno();
			$newUser->apellido_materno = $user->getApellidoMaterno();
			$newUser->sexo = $user->getSexo();
			$newUser->telefono = $user->getTelefono();
			$newUser->fecha_nacimiento = $user->getFechaNacimiento();
			$newUser->email = $user->getEmail();
			$newUser->pais = $user->getPais();

			setcookie($this->cookie_name, json_encode($newUser), time() + (86400 * 30), "/");
		}

		public function getUser() { // Devuelve objeto de clase Usuario [usuario.php]
			$usuario = json_decode($_COOKIE[$this->cookie_name]);
			return new Usuario($usuario->{'id'}, $usuario->{'nombre'}, $usuario->{'apellido_paterno'}, $usuario->{'apellido_materno'}, $usuario->{'sexo'}, $usuario->{'telefono'}, $usuario->{'fecha_nacimiento'}, $usuario->{'email'}, $usuario->{'pais'});
		}

		public function isLogged() { 
			return isset( $_COOKIE[$this->cookie_name] );
		}

	}
?>
<?php

	function redirect($type) {
		switch($type) {
			case "studente":
				header("Location: http://localhost/pcto/student.php");
				break;
			case "delegate":
				header("Location: http://localhost/pcto/business.php");
				break;
			case "school":
				header("Location: http://localhost/pcto/index.php");
				break;
			default:
				header("Location: http://localhost/pcto/login.php");
				break;
		}
	}

	function login() {
		require_once "db.php";
		session_start();
		$email = $_POST["email"];
		$psw = $_POST["password"];

		$sql = "SELECT * FROM users WHERE email=?";
		$data = [$email];
		$result = query($sql, $data)[0];

		if (password_verify($psw, $result["password"])) {
			$_SESSION["id"] = $result["id_user"];
			$_SESSION["user"] = $result;
			redirect($result["type"]);
		} else {
			header("Location: http://localhost/pcto/login.php");
		}
	}

	function signup() {
		require_once "db.php";
		$email = $_POST["email"];
		$password = $_POST["password"];
		$password_hashed = password_hash($password, PASSWORD_BCRYPT);
		$ruolo = $_POST["ruolo"];
		$nome = $_POST["nome"];
		$cognome = $_POST["cognome"];
		$telefono = $_POST["telefono"];
		$provincia = $_POST["provincia"];
		$studio = $_POST["field_of_study"];
		
		$sql = "INSERT INTO users (email, password, name, surname, telephone, province, field_of_study, type) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		$data = [$email, $password_hashed, $nome, $cognome, $telefono, $provincia, $studio, $ruolo];
		$result = query($sql, $data);
		
		header("Location: http://localhost/pcto/index.php");
	}

	if (isset($_POST["login"])) {
		login();
	}
	if (isset($_POST["signup"])) {
		signup();
	}
?>

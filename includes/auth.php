<?php

	function redirect($type) {
		switch($type) {
			case "student":
				header("Location: http://internify.lahlalmouad.it/pcto/student.php");
				break;
			case "delegate":
				header("Location: http://internify.lahlalmouad.it/pcto/business.php");
				break;
			case "school":
				header("Location: http://internify.lahlalmouad.it/pcto/index.php");
				break;
			default:
				header("Location: http://internify.lahlalmouad.it/pcto/login.php");
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
			header("Location: http://internify.lahlalmouad.it/pcto/login.php");
		}
	}

	function signup() {
		require_once "db.php";
		session_start();
		$email = $_POST["email"];
		$password = $_POST["password"];
		$password_hashed = password_hash($password, PASSWORD_BCRYPT);
		$ruolo = $_POST["ruolo"];
		$nome = $_POST["nome"];
		$cognome = $_POST["cognome"];
		$telefono = $_POST["telefono"];
		$provincia = $_POST["provincia"];
		$studio = $_POST["field_of_study"];

		if ($ruolo == "student") {
			$domain = substr($email, strpos($email, "@") + 1);
			$sql = "SELECT id_school, name FROM school WHERE mail_domain=?";
			$data = [$domain];
			$result = query($sql, $data);

			if (is_array($result) && sizeof($result) > 0) {
				$sql = "INSERT INTO users (email, password, name, surname, telephone, province, field_of_study, type, id_school) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
				$data = [$email, $password_hashed, $nome, $cognome, $telefono, $provincia, $studio, $ruolo, $result[0]["id_school"]];
				$result = query($sql, $data);
				
				header("Location: http://internify.lahlalmouad.it/pcto/login.php");
			} else {
				echo "<script>alert('La tua scuola non è iscritta');location.replace('http://internify.lahlalmouad.it/pcto/signup.php');</script>";
			}
		} else {
			$sql = "INSERT INTO users (email, password, name, surname, telephone, province, type) VALUES (?, ?, ?, ?, ?, ?, ?)";
			$data = [$email, $password_hashed, $nome, $cognome, $telefono, $provincia, $ruolo];
			$result = query($sql, $data);
			$_SESSION["email"] = $email;
			header("Location: http://internify.lahlalmouad.it/pcto/setup.php");
		}
	}

	function setup() {
		require_once "db.php";
		$email = $_POST["email"];
		$nome = $_POST["name"];
		$field = $_POST["field"];
		$logo = $_POST["logo"];
		$address = $_POST["address"];
		$provincia = $_POST["provincia"];

		$sql = "SELECT id_user FROM users WHERE email=?";
		$data = [$email];
		$result = query($sql, $data);

		$id_user = $result[0]["id_user"];

		$sql = "INSERT INTO business (name, id_user, field, logo, email, province, address) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$data = [$nome, $id_user, $field, $logo, $email, $provincia, $address];
		$result = query($sql, $data);

		header("Location: http://internify.lahlalmouad.it/pcto/business.php");
	}

	if (isset($_POST["login"])) {
		login();
	}
	if (isset($_POST["signup"])) {
		signup();
	}
	if (isset($_POST["setup"])) {
		setup();
	}
?>
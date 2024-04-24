<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";

        $email = $_POST["mail"];
        $psw = $_POST["psw"];
        
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM test WHERE id='$email' AND name='$psw'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = $result->fetch_assoc();

            echo "Email : ".$row["id"]."<br/>Password : ".$row["name"]."\n";

            if ($email == $row["id"] && $psw == $row["name"]) {
                echo "Login effettuato";
                $_SESSION["logged"] = true;
                header('Location: index.php');
            } else {
                echo "Credenziali errate";
            }
        } else {
            // nessun risultato
        }



        if ($_POST["mail"] == "mlahlal@cerebotani.it" && $_POST["psw"] == "password") {
            echo "logged: true";
            $_SESSION["logged"] = true;
            header('Location: index.php');
        } else {
            echo "logged: false";
        }

        echo "<br/><br/><button><a href='login.php'>GO LOGIN<a/></button>";
    }
?>

<?php if ($_SERVER["REQUEST_METHOD"] == "GET") : ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pcto by mouad</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <form action="login.php" method="POST">
        <input type="email" name="mail" id="mail" placeholder="email" required>
        <input type="password" name="psw" id="psw" placeholder="password" required>
        <input type="submit" value="login">
    </form>
</body>
</html>
<?php endif; ?>
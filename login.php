<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "pcto";

        $email = $_POST["mail"];
        $psw = $_POST["psw"];
        
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = $result->fetch_assoc();

            echo "Email : ".$row["email"]."<br/>Password : ".$row["password"]."\n";

            if (password_verify($psw, $row["password"])) {
                echo "Login effettuato";
                $_SESSION["logged"] = true;
                switch ($row["type"]) {
                    case 'student':
                        header('Location: student/index.php');
                        break;
                    case 'delegate':
                        header('Location: business/index.php');
                        break;
                    case 'school':
                        header('Location: school/index.php');
                        break;
                    
                    default:
                        # code...
                        break;
                }
                header('Location: index.php');
            } else {
                echo "Credenziali errate";
            }
        } else {
            echo "Credenziali errate";
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
    <link rel="stylesheet" href="css/login.css">
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
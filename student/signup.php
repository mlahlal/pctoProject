<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "pcto";

        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $email = $_POST["mail"];
        $psw = password_hash($_POST["psw"], PASSWORD_BCRYPT);
        $province = $_POST["province"];
        $field_of_study = $_POST["field_of_study"];
        $telephone = $_POST["telephone"];
        
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            echo "Connesso";
        }

        $sql = "INSERT INTO users (name, surname, email, telephone, password, province, field_of_study) VALUES ('$name', '$surname', '$email', '$telephone', '$psw', '$province', '$field_of_study');";
        $result = mysqli_query($conn, $sql);

        print_r($result);

        header('Location: login.php');

        // if (mysqli_num_rows($result) > 0) {
        //     $row = $result->fetch_assoc();

        //     echo "Email : ".$row["email"]."<br/>Password : ".$row["password"]."\n";

        //     if (password_verify($psw, $row["password"])) {
        //         echo "Login effettuato";
        //         $_SESSION["logged"] = true;
        //         header('Location: index.php');
        //     } else {
        //         echo "Credenziali errate";
        //     }
        // } else {
        //     echo "Credenziali errate";
        // }

        // echo "<br/><br/><button><a href='login.php'>GO LOGIN<a/></button>";
    }
?>

<?php if ($_SERVER["REQUEST_METHOD"] == "GET") : ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pcto by mouad</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <form action="signup.php" method="POST">
        <input type="text" name="name" id="name" placeholder="name" required>
        <input type="text" name="surname" id="surname" placeholder="surname" required>
        <input type="tel" name="telephone" id="telephone" placeholder="telephone" required>
        <select name="province" id="province" placeholder="province" required>
            <option value="brescia">brescia</option>
            <option value="roma">roma</option>
            <option value="palermo">palermo</option>
        </select>
        <input type="text" name="field_of_study" id="field_of_study" placeholder="field of study" required>
        <input type="email" name="mail" id="mail" placeholder="email" required>
        <input type="password" name="psw" id="psw" placeholder="password" required>
        <input type="submit" value="signup">
    </form>
</body>
</html>
<?php endif; ?>
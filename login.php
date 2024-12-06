<?php
session_start();

if (isset($_SESSION["user"])) {
    header("location: index1.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once "database.php";

    $sql = "SELECT * FROM register WHERE email=?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            $user = mysqli_fetch_assoc($result);

            if ($user && password_verify($password, $user["Password"])) {
                $_SESSION["user"] = "yes";
                header("location: index1.php");
                exit();
            } else {
                $errorMessage = "Incorrect email or password";
            }
        } else {
            $errorMessage = "Error executing the query";
        }

        mysqli_stmt_close($stmt);
    } else {
        $errorMessage = "Error preparing the statement";
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link rel="icon" type="image/x-icon" href="img1.ico">
    <link rel="stylesheet" href="style2.css">
    <meta charset="utf-8">
    <title>Login Page</title>
    <body style="background-image: url('image1.jpg');">
</head>

<body>
    <div class="container">
        <?php
        if (isset($errorMessage)) {
            echo "<div class='alert alert-danger'>$errorMessage</div>";
        }
        ?>
        <form class="form" action="login.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" placeholder="Enter Email" required>
            </div><br><br>
            <div class="form-group">
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div><br><br>
            <div class="btn">
                <input type="submit" name="submit" id="btn" value="LOGIN">
            </div>
        </form>
        <div class="login">
            <p>Not registered yet?<a href="registration.php" target="_blank";>Register here</a></p>
        </div>
    </div>
</body>

</html>

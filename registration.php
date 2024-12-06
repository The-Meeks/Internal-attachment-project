<!--<?php
  // include("connection.php");
 ?>-->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="icon" type="image/x-icon" href="img2.ico">
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <meta charset="utf-8">
    <title>Registration Page</title>
  </head>
  <body style="background-image: url('image1.jpg');">



    <div class="container">
      <?php
      if (isset($_POST["submit"])) {
          $fullName = $_POST["fullname"];
          $email = $_POST["email"];
          $password = $_POST["password"];
          $passwordrepeat = $_POST["repeat-password"];
          $passwordHash = password_hash($password, PASSWORD_DEFAULT);
          $errors = array();

          if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordrepeat)) {
              array_push($errors, "All fields required");
          }

          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              array_push($errors, "Email is not valid");
          }

          if (strlen($password) < 8) {
              array_push($errors, "Password must be at least 8 characters long");
          }

          if ($password !== $passwordrepeat) {
              array_push($errors, "Password doesn't match");
          }
        require_once "database.php";
        $sql = "SELECT * FROM register WHERE Email='$email'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount>0) {
          array_push($errors, "Email Already Exists");
        }

          if (count($errors) > 0) {
                   echo '<div class="error-container">';
                   foreach ($errors as $error) {
                       echo "<div class='alert alert-danger'>$error</div>";
                   }
                   echo '</div>';
               }
               else{
                 $sql = "INSERT INTO register(FullName, Email, Password) VALUES (?, ?, ?)";
                  $stmt = mysqli_stmt_init($conn);
                  $preparestmt = mysqli_stmt_prepare($stmt,$sql);
                  if ($preparestmt) {
                   mysqli_stmt_bind_param($stmt, "sss", $fullName, $email, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='allert alert-success'>You are registered successfully</div>";
                  }
                  else {
                    die("Something went wrong");
                  }
               }
      }
      ?>
      <form class="form" action="registration.php" method="post">
        <div class="form-group">
          <input type="text" name="fullname" id="name" placeholder="Full Name">
        </div> <br><br>
        <div class="form-group">
          <input type="email" name="email" placeholder="Email">
        </div><br><br>
        <div class="form-group">
          <input type="password" name="password" placeholder="Password">
        </div><br><br>
        <div class="form-group">
          <input type="password" name="repeat-password" placeholder="Repeat Password">
        </div><br><br>
        <div class="btn">
          <input type="submit" name="submit" id="btn" value="REGISTER">
        </div>
      </form>
      <div class="login">
            <p>Already registered?<a href="login.php">Login here</a></p>
      </div>
    </div>
  </body>
    </html>

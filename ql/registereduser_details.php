<?php
// Start session
session_start();

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password= $_POST['password'];
    $email = $_POST['email'];

    // Query to check if the user is registered
    $sql = "SELECT * FROM registration WHERE  email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User is registered
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        header("Location: category_selection.php");
    } else {
        // User is not registered
        header("Location: registerlogin.html");
    }
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>User Registration</title>
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" href="css/reg_style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://www.google.com/recaptcha/api.js?render=6Lerz7kUAAAAAFviVfTF2XuO7qlmNZaScpGY0NDw"> </script>
    <script src="scripts/captcha.js"></script>
  </head>
  <style>
    .pdc{
  padding: 7px;
  border-radius: 15px;
  font-weight: 800;
  font-size: 14px;
}
.sb{
  background: #00f1ff;
}
    </style>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <div class="register-left">
                <img src="img/news2.jpg">
                <h1>Check Registration details</h1>
                <button type="button" class="btn btn-primary"> <a href='register.php' class='ctn' align='center' color='green'>Register First</a></button>
              </div>
            </div>

            <div class="col-md-6 register-right">
              <h2>Check Here</h2>
              <form action="" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                  <input class="pdc" type="email" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <input class="pdc" type="password" id="password" name="password" placeholder="favorite programminglanguage name" required>
                </div>
                <button class=" pdc sb">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
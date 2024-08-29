
<?php
include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" type="text/css" href="css\stylesheet.css">
    <link href="" rel="stylesheet">
</head>
<body >
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">
        <div class="signup">
            <form action="signup_process.php" method="POST">
                <label for="chk" aria-hidden="true">SIGNUP</label>
                <!--<input type="text" id="rollno" name="rollno" placeholder="Roll Number" required>-->
                <input type="text" id="username" name="username" placeholder="Username" required>
                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" required>
                <button type="submit">Sign up</button>
            </form>
        </div>           
        <div class="login">
            <form action="" method="POST">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="submit">Login</button>
            </form>
        </div> 
        
    </div>

    <?php
    if(isset($_POST["submit"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        $query = "SELECT * FROM signup WHERE email='$email' AND password='$password'";
        $data = mysqli_query($conn, $query);
        
        $total = mysqli_num_rows($data);
        if($total == 1) {
            header('Location: dashboard.html');
        } else {
            header('Location: loginfailed.php');
        }
    }
    ?>
</body>
</html>
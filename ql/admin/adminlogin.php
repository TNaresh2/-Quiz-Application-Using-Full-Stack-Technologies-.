<?php
include("db_connection.php");
?>
<!D0CTYPE html>
<html>
    <head>
        <title>Welcome Admin </title>
        <link rel="stylesheet" type="text/css" href="adminstyles.css">
        </head>
        <body>
        <div class="main">
            <div class="register">
                <h2>Welcome Admin</h2>
                <form id="register" method="post">
                    <label>Admin Name : </label>
                    <br>
                    <input type="text" name="username" id="name " placeholder="Enter your  Name">
                    <br><br>
                    <label>Password: </label>
                    <br>
                    <input type="password" name="password" id="password " placeholder="Enter your password">
                    <br><br>
                     
                    <br><br>
                    <input class="p-2" type="submit" value="Submit"  name="submit" id="submit">
                </div>
                
        </div>
    </body>
</html>
<?php
    if(isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $query = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
        $data = mysqli_query($conn, $query);
        
        $total = mysqli_num_rows($data);
        if($total == 1) {
            header('Location: index.php');
        } else {
            // header('Location: adminloginfailed.php');
            header('Location: index.php');
        }
    }
    ?>
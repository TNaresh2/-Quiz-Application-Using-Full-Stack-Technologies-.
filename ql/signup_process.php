<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$rollno = $_POST['rollno'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // Basic validation
    if ($password !== $confirmpassword) {
        echo "<font color='red'>Passwords do not match!</font>";
        exit();
    }

    // Hash the password for security
    //$hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $check_email_query = "SELECT * FROM signup WHERE email='$email'";
    $result = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($result) > 0) {
        echo "<font color='red'><h2>Email already exists!<h2></font>";
    } else {
        // Insert new user into the database
        $query = "INSERT INTO signup ( username, email, password,confirmpassword) VALUES ( '$username', '$email', '$password','$confirmpassword')";
        if (mysqli_query($conn, $query)) {
            echo "<font color='green'><h2>Signup successful! You can now <a href='login.php'>login</a><h2></font>";
        } else {
            echo "<font color='red'>Error: " . mysqli_error($conn) . "</font>";
        }
    }
}
?>
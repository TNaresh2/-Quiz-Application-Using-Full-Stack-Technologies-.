<?php
session_start();
include_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category'])) {
    $category_id = intval($_POST['category']);
    $_SESSION['category_id'] = $category_id;

    // Select 10 random questions from the selected category
    $query = "SELECT * FROM Questions WHERE category_id = $category_id ORDER BY RAND() LIMIT 10";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $_SESSION['questions'] = $questions;
        $_SESSION['current_question'] = 0;
        $_SESSION['category_time'] = 600; // 10 minutes
        $_SESSION['fifty_fifty_used'] = [];
        header("Location: quiz_question.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Category</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="st.css">
    <link rel="stylesheet" href="home.css">
   
</head>
<style>
        .img-fluid {
            max-width: 57%;
    height: 100%;
        }
        .sel{
            margin-bottom: 20px;
        }
    </style>
<body style="background-image: url('img/category2.avif'); background-size: cover; background-repeat: no-repeat; background-position: center; height: 100vh; margin: 0; padding: 0;">

<nav class="navbar">
    <h1 class="logo">QUIZ</h1>
    <ul class="nav-links">
        <li class="active"><a href="home.php">Home</a></li>
        <li class="ctn"><a href="register.php" name="quiz">Quiz</a></li>
        <li class="ctn"><a href="news.php" name="General knowledge">General knowledge</a></li>
        <li class="ctn"><a href="view_score.php" name="scores">Scores</a></li>
        <li class="ctn"><a href="aboutus.html" name="aboutus">Aboutus</a></li>
        <li class="ctn"><a href="logout.html" name="logout">Logout</a></li>
    </ul>
    <img src="menu-btn.png" alt="" class="menu-btn"></img>
</nav>

<div class="container sel">
    <h1>Select Category</h1>
    <form action="category_selection.php" method="post">
        <?php
        // Fetch categories from database
        $query = "SELECT * FROM Categories";
        $result = mysqli_query($conn, $query);

        // Display categories as options
        echo '<select name="category" class="form-control">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['category_id'] . '">' . $row['name'] . '</option>';
        }
        echo '</select>';
        ?>
        <button type="submit" class="btn btn-primary mt-3">Start Quiz</button>
    </form>
</div>

</body>
</html>

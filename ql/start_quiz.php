<?php
session_start();
include_once 'db.php';

if (!isset($_GET['category_id'])) {
    header("Location: category_selection.php");
    exit();
}

$category_id = $_GET['category_id'];
$_SESSION['category_id'] = $category_id;

// Fetch questions for the selected category
$query = "SELECT * FROM Questions WHERE category_id = $category_id";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error: " . mysqli_error($conn);
    exit();
}

$questions = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (count($questions) == 0) {
    echo "No questions available for this category.";
    exit();
}

$_SESSION['questions'] = $questions;
$_SESSION['current_question'] = 0;
$_SESSION['score'] = 0;
$_SESSION['category_time'] = 600; // 10 minutes
$_SESSION['fifty_fifty_used'] = false;

header("Location: quiz.php");
exit();
?>

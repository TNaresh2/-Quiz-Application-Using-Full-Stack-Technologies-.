
<?php
// Start session
session_start();

// Check if category is selected
if (!isset($_POST['category'])) {
    header("Location: category_selection.php");
    exit();
}

// Include database connection
include_once 'db.php';

// Fetch questions for selected category
$category_id = $_POST['category'];
$query = "SELECT * FROM Questions WHERE category_id = $category_id";
$result = mysqli_query($conn, $query);
$questions = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Set session variables
$_SESSION['category_id'] = $category_id;
$_SESSION['questions'] = $questions;
$_SESSION['current_question'] = 0;
$_SESSION['score'] = 0;

// Redirect to first question
header("Location: quiz_question.php");
exit();
?>

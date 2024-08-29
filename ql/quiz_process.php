
<?php
// Start session
session_start();

// Check if option is selected
if (!isset($_POST['option'])) {
    header("Location: category_selection.php");
    exit();
}

// Include database connection
include_once 'db.php';

// Retrieve selected option and current question
$selected_option_id = $_POST['option'];
$current_question = $_SESSION['current_question'];
$questions = $_SESSION['questions'];
$question = $questions[$current_question];

// Check if selected option is correct
$query = "SELECT * FROM Options WHERE question_id = " . $question['question_id'] . " AND option_id = $selected_option_id AND is_correct = 1";
$result = mysqli_query($conn, $query);

// Update score based on correctness
if (mysqli_num_rows($result) > 0) {
    $_SESSION['score']++;
}

// Move to next question or end of quiz
$_SESSION['current_question']++;
if ($_SESSION['current_question'] >= count($questions)) {
    header("Location: quiz_result.php");
} else {
    header("Location: quiz_question.php");
}
exit();
?>
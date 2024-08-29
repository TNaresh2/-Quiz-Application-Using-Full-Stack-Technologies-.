
<?php
session_start();

if (!isset($_SESSION['current_question']) || $_SESSION['current_question'] <= 0) {
    header("Location: quiz_question.php");
    exit();
}

$_SESSION['current_question']--;
header("Location: quiz_question.php");
exit();
?>

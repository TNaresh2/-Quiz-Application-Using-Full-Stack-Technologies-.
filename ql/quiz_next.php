<?php
session_start();

if (!isset($_SESSION['current_question']) || $_SESSION['current_question'] >= count($_SESSION['questions']) - 1) {
    header("Location: quiz_result.php");
    exit();
}

$_SESSION['current_question']++;
header("Location: quiz_question.php");
exit();
?>

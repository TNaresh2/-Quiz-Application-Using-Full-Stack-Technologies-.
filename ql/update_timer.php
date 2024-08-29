<?php
// update_timer.php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['timeLeft'])) {
    $_SESSION['category_time'] = intval($_POST['timeLeft']);
}
?>

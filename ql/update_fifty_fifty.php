<?php
// update_fifty_fifty.php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category_id'])) {
    $category_id = intval($_POST['category_id']);
    if (!in_array($category_id, $_SESSION['fifty_fifty_used'])) {
        $_SESSION['fifty_fifty_used'][] = $category_id;
    }
}
?>

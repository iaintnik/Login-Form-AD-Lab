<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
include 'db.php';

if (isset($_GET['roll'])) {
    $stmt = $pdo->prepare("DELETE FROM students WHERE roll_number = ?");
    $stmt->execute([$_GET['roll']]);
}

header('Location: index.php?page=display');
exit;
?>
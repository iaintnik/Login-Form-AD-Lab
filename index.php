<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KIIT University Admin Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2 style="color: white; margin-bottom: 30px;">KIIT Admin Portal</h2>
            <button onclick="window.location.href='index.php?page=dashboard'">Dashboard</button>
            <button onclick="window.location.href='index.php?page=display'">Display Data</button>
            <button onclick="window.location.href='logout.php'" style="margin-top: 50px;">Logout</button>
        </div>

        <div class="content">
            <?php 
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                if (in_array($page, ['dashboard', 'display'])) {
                    include $page . '.php';
                } else {
                    include 'dashboard.php';
                }
            } else {
                include 'dashboard.php';
            }
            ?>
        </div>
    </div>
</body>
</html>
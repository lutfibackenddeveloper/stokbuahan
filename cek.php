<?php
session_start();
if (!isset($_SESSION['log'])) {
    header('Location: login.php');
    exit();
}
?>

<?php session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['fecven'])) {
        $_SESSION['fecven'] = $_POST['fecven'];
    } 
} 

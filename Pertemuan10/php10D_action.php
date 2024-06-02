<?php 
session_start();
require "php10E_action.php";

if (isset($_SESSION['username'])) {
    header("Location: php10F.php"); 
    exit(); 
}

if (isset($_POST['password']) && $_POST['username']) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = query("SELECT * FROM user WHERE username = ? AND password = ?", [$username, $password]);
    if (count($user) > 0) {
        header("Location: php10F.php"); 
        $_SESSION['username'] = $_POST['username'];
        exit();   
    } else {
        echo "<script> 
            alert('Username atau password salah');
            window.location.href = 'php10D.php';
        </script>";
    }
}
?>
<?php 

// hapus session
session_start();
$_SESSION=[];
session_destroy();
session_unset();

header("Location:php10D.php");

?>
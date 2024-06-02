<?php 
require "php09E_action.php";
$slot = $_GET["slot"];

// cek apakah eksekusi berhasil
if (execution("DELETE FROM meetings WHERE slot = '$slot'") < 1) {
    echo "<script>
        alert('Data gagal dihapus');
    </script>";
} 
header("Location:php09F.php");

?>
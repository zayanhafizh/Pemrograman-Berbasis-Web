<?php 
require "php10E_action.php";
$slot = $_GET["slot"];

// cek apakah eksekusi berhasil
$statement = "DELETE FROM meetings WHERE slot = ?";
$params = [$slot];

if (execution($statement, $params) < 1) {
    echo "<script>
        alert('Data gagal dihapus');
    </script>";
} else {
    echo "<script>
        alert('Data berhasil dihapus');
    </script>";
}
header("Location:php10F.php");

?>
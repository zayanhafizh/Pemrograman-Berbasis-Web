<?php 
require"php09E_action.php";
$slot = $_GET["slot"];

$data = query("SELECT * FROM meetings WHERE slot = $slot")[0];

// Cek tombol submit sudah ditekan?
if (isset($_POST["submit"])) {
    $name = htmlspecialchars($_POST["name"]); 
    $email = htmlspecialchars($_POST["email"]);
    $statement = "UPDATE meetings SET `name` = '$name', email = '$email' WHERE slot = '$slot'";
    if (execution($statement) > 0) {
        header("Location:php09F.php");
    } else {
        echo "<script>
            alert('Gagal mengubah data');
        </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input {
            margin: auto;
        }
    </style>
</head>
<body>
    <form action="" method="post">
    <ul>
        <li>
            <label for="slot">Slot :</label>
            <input type="text" name="slot" id="slot" value="<?= $data["slot"] ?>" required>
        </li>
        <li>
            <label for="name">Name :</label>
            <input type="text" name="name" id="name" value="<?= $data["name"]  ?>" required>
        </li>
        <li>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?= $data["email"]  ?>" required>
        </li>
        <li>
            <button type="submit" name="submit">Ubah</button>
        </li>
    </ul>
    </form>
</body>
</html>
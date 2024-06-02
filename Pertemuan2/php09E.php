<?php 
    require "php09E_action.php";
    if (isset($_POST["submit"])) {
        $name = htmlspecialchars($_POST["name"]); 
        $email = htmlspecialchars($_POST["email"]);
        $slot = htmlspecialchars($_POST["slot"]);
        $statement = "INSERT INTO meetings VALUES 
                    ($slot, '$name', '$email')";
        $result = execution($statement);
        if (($result) < 1) {
            echo "<script>
                alert('Data gagal ditambahkan');
            </script>";
        } else {
            header("Location:php09F.php");
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
        ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        }
    </style>
</head>
<body>
<form action="" method="post">
    <h1>Form Menambahkan Data Meeting</h1>
    <ul>
        <li><label for="slot">Slot :</label></li>
        <li><input type="text" id="slot" name="slot" required></li>
        <li><label for="name">Name :</label></li>
        <li><input type="text" id="name" name="name" required></li>
        <li><label for="email">Email :</label></li>
        <li><input type="text" id="email" name="email" required></li>
        <li><button name="submit">Tambah</button></li>
    </ul>
</form>
</body>
</html>
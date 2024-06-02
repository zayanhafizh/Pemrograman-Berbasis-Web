<?php 
require"php10E_action.php";
$slot = $_GET["slot"];

$data = query("SELECT * FROM meetings WHERE slot = $slot")[0];

// Cek tombol submit sudah ditekan?
if (isset($_POST["submit"])) {
    $name = htmlspecialchars($_POST["name"]); 
    $email = htmlspecialchars($_POST["email"]);
    $slot = htmlspecialchars($_POST["slot"]); // Assuming slot is also part of POST data and needs to be sanitized

    // Using prepared statements to prevent SQL injection
    $statement = "UPDATE meetings SET `name` = ?, email = ? WHERE slot = ?";
    $params = [$name, $email, $slot];

    if (execution($statement, $params) > 0) {
        header("Location: php10F.php");
        exit();
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
        ul {
            list-style: none;
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
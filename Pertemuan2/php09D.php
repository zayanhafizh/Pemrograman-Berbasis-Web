<?php 
    $db_hostname = "localhost"; // Write your own db server here
    $db_database = "bebas"; // Write your own db name here
    $db_username = "root"; // Write your own username here
    $db_password = ""; // Write your own password here
    // For the best practice, don’t
    // use your “real” password when
    // submitting your work

    $db_charset = "utf8mb4"; // Optional
    $db_charset = "utf8mb4"; // Optional
    $dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";
    $opt = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
    );
    try {
        $pdo = new PDO($dsn,$db_username,$db_password,$opt);
        $stmt = $pdo->query("SELECT * FROM meetings ORDER BY slot ASC");
    }
        catch (PDOException $e) {
        exit("PDO Error: ".$e->getMessage()."<br>");
    }
?>

<!DOCTYPE html> <html lang='en-GB'>
<head>
<title>PHP09 D</title>
</head>
<body>
<h1>PHP and Databases</h1>
<h2>Data in meeting table (while loop)</h2>
<table border="1" cellpadding="10" cellspacing="0">
    <?php while ($row = $stmt->fetch()) : ?>
        <tr>
            <td><?= $row["slot"] ?></td>
            <td><?= $row["name"] ?></td>
            <td><?= $row["email"] ?></td>
        </tr>
    <?php endwhile ?>
</table>
<h2>Data in meeting table (foreach)</h2>
<table border="1" cellpadding="10" cellspacing="0">
    <!-- Query stmt lagi karena waktu pakai while udah di fetch -->
    <?php $stmt = $pdo->query("SELECT * FROM meetings ORDER BY slot ASC"); ?>
    <?php foreach($stmt as $row) : ?>
        <tr>
            <td><?= $row["slot"] ?></td>
            <td><?= $row["name"] ?></td>
            <td><?= $row["email"] ?></td>
        </tr>
    <?php endforeach ?>
</table>
</body>
</html>
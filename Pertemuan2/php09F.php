<?php 
require"php09E_action.php";

$rows = query("SELECT * FROM meetings")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP09F</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        a:last-child { 
            color: red;
        }

        a:first-child {
            color: blue;
        }
    </style>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Slot</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php foreach($rows as $row) :?>
        <tr>
            <td><?php echo $row["slot"]; ?></td>
            <td><?php echo $row["name"];?></td>
            <td><?php echo $row["email"]; ?></td>
            <td>
                <a href="php09G.php?slot=<?=  $row["slot"]; ?>"><i data-feather="edit"></i></a>
                <a href="php09H.php?slot=<?=  $row["slot"]; ?>"><i data-feather="x-circle"></i></a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
    <script>
      feather.replace();
    </script>
</body>
</html>
<?php 
require"php11E_action.php";

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
        ul {
            padding: 0;
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 25rem;
            height: 2rem;
            background-color: black;
        }

        li {
            display: flex;
            height: 100%;
            align-items: center;
        }


        #data-meeting, #logout {
            padding-left: 3rem;
            padding-right: 3rem;
            height: 100%;
            color: #ffff;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        #data-meeting:hover, #logout:hover {
            background-color: red;
        }

        button {
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <?php include "php11F_header.php" ?>
    <form action="">
        Name: <input type="text" id="txt1"
        onkeyup="showHint(this.value)">
    </form>
    <p>Suggestions: <span id="txtHint"></span></p>
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
                <a href="php10G.php?slot=<?=  $row["slot"]; ?>"><i data-feather="edit"></i></a>
                <a href="php10H.php?slot=<?=  $row["slot"]; ?>"><i data-feather="x-circle"></i></a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
    <button> Tambah </button>
    <script>
      feather.replace();
    </script>
    <script>
        var button =document.querySelector('button');
        button.addEventListener('click', function() {
            location.href = "php10E.php"
        })
    </script>
    <script src="php11F_suggestion.js"></script>
</body>
</html>
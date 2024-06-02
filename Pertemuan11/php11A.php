<?php 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://reqres.in/api/users?page=1");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$output = curl_exec($ch);
curl_close($ch);
echo $output;
$data = json_decode($output,true);
echo "<br/><br/>";
var_dump($data);
echo "<br/><br/>";
// $data = file_get_contents("https://reqres.in/api/users?page=1");
// $parse_data = json_decode($data,true);
// $rows = $parse_data["data"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>email</th>
            <th>first-name</th>
            <th>last-name</th>
            <th>avatar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($rows as $row) : ?>
            <tr>
                <td><?= $row["id"]  ?></td>
                <td><?= $row["email"]  ?></td>
                <td><?= $row["first_name"]  ?></td>
                <td><?= $row["last_name"]  ?></td>
                <td><img src="<?= $row["avatar"]  ?>" alt=""></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
</body>
</html>
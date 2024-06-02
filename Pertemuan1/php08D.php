<!DOCTYPE html>
<html>
<head>
<title>PHP 08D</title>
</head>
<body>
<h1>Associative Arrays</h1>
    <?php
        $dict1 = array('a' => 1, 'b' => 2);
        $dict2 = $dict1;
        $dict1['b'] = 4;
        echo "\$dict1['b'] = ", $dict1['b'],"<br>\n";
        echo "\$dict2['b'] = ", $dict2['b'],"<br>\n";
        echo "<br>";

        foreach ($dict1 as $key => $value) {
            echo $key." = ".$value;
            echo "<br>";
        }

        echo "<br>";

        $text = 'lorem ipsum elit congue auctor inceptos taciti suscipit tortor auctor integer congue hac nullam hac auctor tellus nullam inceptos nullam integer tellus nullam auctor elit lorem ipsum elit';

        $key = explode(" ", $text);

  
        $value = array_count_values($key);
        $key = array_unique($key);
        $dict3 = array_combine($key, $value);
    ?>

    <table border="1" cellspacing="0">
        <tr>
            <td>Kata</td>
            <td>Jumlah Kemunculan</td>
        </tr>
        <?php foreach ($dict3 as $key => $value) :?>
            <tr>
                <td><?=  $key;?></td>
                <td style="text-align: right;"><?=  $value;?></td>
            </tr>
        <?php endforeach ?>
    </table>

</body>
</html>
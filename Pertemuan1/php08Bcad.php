<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello World</h1>
    <?php

use function PHPSTORM_META\type;

        error_reporting( E_ALL );
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        echo "<h2>Types and Type Casting</h2>\n";
        $mode = rand(1,4);
        if ($mode == 1) {
            $randvar = rand();
            echo "This is ".gettype($randvar)." ".$randvar;
        }
        elseif ($mode == 2) {
            $randvar = (string) rand();
             echo "This is ".gettype($randvar)." ".$randvar;
        }
        elseif ($mode == 3) {
            $randvar = rand()/(rand()+1);
             echo "This is ".gettype($randvar)." ".$randvar;
        }
        else {
            $randvar = (bool) $mode; 
             echo "This is ".gettype($randvar)." ".$randvar;
        }
        echo "<br><br>";
        echo "Random scalar: $randvar<br>\n"; 
    ?>
</body>
</html>
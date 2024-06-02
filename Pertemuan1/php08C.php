<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Array Operators and Regular Expressions</h1>
<?php
    echo "<h2>Exercise 2A</h2>\n";
    $planets = array("earth");
    array_unshift($planets,"mercury","venus");
    array_push($planets,"mars","jupiter","saturn");
    echo "(1) \$planets = [",join(", ",$planets),"]<br>\n";
    $last = array_pop($planets);
    echo "(2) \$planets = [",join(", ",$planets),"]<br>\n";
    $first = array_shift($planets);
    echo "(3) \$planets = [",join(", ",$planets),"]<br>\n";
    echo "(4) \$first = $first, \$last = $last<br>\n";

    echo "<br><br><br>";

    $spheres = $planets;
    echo "(5) \$spheres = [",join(", ",$spheres),"]<br>\n";
    $planets[1] = "midgard";
    echo "(6) \$planets = [",join(", ",$planets),"]<br>\n";
    echo "(6) \$spheres = [",join(", ",$spheres),"]<br>\n";
    $spheres = &$planets;
    echo "(7) \$spheres = [",join(", ",$spheres),"]<br>\n";
    $planets[0] = "friga";
    echo "(8) \$planets = [",join(", ",$planets),"]<br>\n";
    echo "(8) \$spheres = [",join(", ",$spheres),"]<br>\n";

    echo "<br><br><br>";
    
    while (count($planets)) {
        echo "Removed : ".array_pop($planets)." Remaining : [";
        foreach ($planets as $planet) {
            echo $planet;
        };
        echo "]"."<br>";
    }

    echo "<br><br><br>";

    $names = ["Dave Shield", "Mr Andy Roxburgh",
            "Dr George Christodoulou", "Dr Ullrich Hustadt",
            "Dr David Jackson"];

    foreach ($names as $name)
        echo "(1) Name: $name<br>\n";
    

    echo "<br><br><br>";

    foreach ($names as $name) {
        $namaDepan = explode(" ",$name)[0];
        $namaBelakang = explode(" ",$name)[1];
        echo "(2) Name: ".$namaDepan.",".$namaBelakang."<br>\n";
    }
    ?>
</body>
</html>
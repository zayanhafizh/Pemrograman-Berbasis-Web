<!DOCTYPE html>
<html lang='en-GB'>
<head>
<title>PHP 08E</title>
<META name="description" content="php08E.php">
</head>
<body>
<h1>Variable-length Argument Lists</h1>
    <?php

    function reduceOp() {
        $args = func_get_args();
        $operator = null;

        foreach ($args as $arg) {
            if ( (is_array($arg)) && isset($arg['op']) ) {
                $operator = $arg['op']; 
            } else {
                $numbers[] = $arg;
            }
        }

        if (!isset($numbers)) {
            return null;
        }
       
        switch ($operator) {
            case '+':
                $result = array_sum($numbers);
                return $result;
            case '-':
                $result = array_shift($numbers);
                foreach ($numbers as $number) {
                    $result -= $number ;
                }
                return $result;
            case '*':
                $result = array_product($numbers);
                return $result;
        }
    }



        try {
            echo "1: ", reduceOp(2,3), "<br>\n",
            throw new exception('Type Error');
            "<br>\n";# throws an exception
        }
        catch (Exception $e) {
            echo "1: Exception ",$e->getMessage(),"<br>\n"; # 'TypeError'
        }
        
        try {
            echo "2: ",reduceOp(2,3,array('op' => '/')), "<br>\n", # throws an
            throw new exception('Value Error');
            "<br>\n";
        }
        catch (Exception $e) {
            echo "2: Exception ",$e->getMessage(),"<br>\n"; # 'ValueError'
        }
        
        echo "3: ",reduceOp(array('op'=>'+')), # should return NULL
        "<br>\n";
        echo "4: ",reduceOp(2,array('op' => '*')), # should return 2
        "<br>\n";
        echo "5: ",reduceOp(2,3,5,array('op' => '+')), # should return 10
        "<br>\n";
        echo "6: ",reduceOp(2,3,5,7,array('op' => '*')), # should return 210
        "<br>\n";
        echo "7: ",reduceOp(2,3,5,7,11,array('op' => '-')),# should return -24
        "<br>\n";
    ?>
</body>
</html>
<?php 
    $first_name = htmlspecialchars(filter_input(INPUT_POST, 'first_name'));
    $last_name = htmlspecialchars(filter_input(INPUT_POST, 'last_name'));
    
    $some_number = 42;
    
    // increment
    $some_number++;
    
    // decrement
    $some_number--;
    
    // combined assignment operator
    $some_number += 10;     
    $some_number -= 10;
    
    $some_number_with_a_decimal = 7.7;
    
    $name = "Eric Charnesky";
    
    $name .= " MSIS";
    
    $is_awesome = true;
    
    // integer division
    $interger_quotient = intdiv(7, 2);
    
    $output = "";
    
            
        $counter = 1;
        while ($counter < 10){
            $output .= "</br> $counter";
            $counter++;
        }
        
        for( $index = 0; $index < 10; $index++ ){
            $output .= "</br> $index";
        }
?>

   

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
         <?php include ('nava.php'); ?>
                
        <?php
        echo "Hi $first_name $last_name";
        echo "</br>";
        echo $some_number . " is the answer";
        echo "</br>";
        echo "$name is awesome: $is_awesome";
        echo "</br>";
        echo "7 / 2 is: " . ( 7 / 2 );
        
        if ( $first_name == "Eric" ){
            echo " Hi Eric!";
        } else {
            echo " You aren't Eric";
        }
        
        // === is for identical - same value and same type
        if ( $first_name === 10 ){
            echo " you are named 10?";
        } else {
            echo " You aren't 10";
        }

        echo $output;
        ?>

    </body>
</html>

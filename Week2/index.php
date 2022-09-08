<?php 
    $first_name = htmlspecialchars(filter_input(INPUT_GET, 'first_name'));
    $last_name = htmlspecialchars(filter_input(INPUT_GET, 'last_name'));
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php include ('nav.php'); ?>
        
        
        <form action="index.php" method="get"> 
            <label>First name: </label> 
            <input type="text" name="first_name"/><br> 
            <label>Last name: </label> 
            <input type="text" name="last_name"/><br> 
            <label>&nbsp;</label>
            <input type="submit" value="Submit"/> 
        </form>
        
        <form action="view.php" method="post"> 
            <label>First name: </label> 
            <input type="text" name="first_name"/><br> 
            <label>Last name: </label> 
            <input type="text" name="last_name"/><br> 
            <label>&nbsp;</label>
            <input type="submit" value="Submit"/> 
        </form>
        
        <?php
        echo "Hi " . $first_name . " " . $last_name;
        ?>

    </body>
</html>

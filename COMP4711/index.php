<!DOCTYPE html>
<!--/**
 * Created by PhpStorm.
 * User: Sam Salvail
 * Date: 2016-01-06
 * Time: 10:52 AM
 */-->
<html>
    <head>
        <title>index</title>
    </head>
    <body>
    <?php
        //code
        $name = 'Jim';
        $what = 'geek';
        $level = 10;
        echo 'Hi, my name is ' . $name . ', and I am a level ' . $level . ' ' . $what;
        echo "<br/>";

        $hoursworked = 10;
        $rate = 12;
        $total = $hoursworked * $rate;
        echo 'You owe me ' . $total;
    ?>
    </body>
</html>

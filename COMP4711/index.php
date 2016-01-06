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
        if(!isset($_GET['board'])){
            die("Must set board");
        }
        $position = $_GET['board'];
        $squares = str_split($position);

        if(winner('x', $squares)) echo 'You win!';
        else if(winner('o', $squares)) echo 'I win!';
        else echo 'No winner yet...';
    ?>
    </body>
</html>
<?php
function winner($token, $position) {
    $won = false;

    // horizontals:
    for($row = 0; $row < 3; $row++) {
        if(($position[3 * $row] == $token) && ($position[3 * $row + 1] == $token) && ($position[3 * $row + 2] == $token)){
            $won = true;
        }
    }

    //verticals:
    for($col = 0; $col < 3; $col++) {
        if(($position[1 * $col] == $token) && ($position[1 * $col + 3] == $token) && ($position[1 * $col + 6] == $token)){
            $won = true;
        }
    }

    //diagonals:
    if (($position[0] == $token) &&
        ($position[4] == $token) &&
        ($position[8] == $token)) {
        $won = true;
    } else if (($position[2] == $token) &&
        ($position[4] == $token) &&
        ($position[6] == $token)) {
        $won = true;
    }

    return $won;
}

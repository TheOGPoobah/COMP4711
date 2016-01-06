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

        $game = new Game($position);
        if ($game->winner('x'))
            echo 'You win. Lucky guesses!';
        else if ($game->winner('o'))
            echo 'I win. Muahahahahahahahaha';
        else
            echo 'No winner yet, but you are losing.';
    ?>
    </body>
</html>
<?php

class Game {
    var $position;
    var $newposition;
    function __construct($squares) {
        $this->position = str_split($squares);
        $this->display();
    }

    function winner($token) {
        $won = false;

        // horizontals:
        for($row = 0; $row < 3; $row++) {
            if(($this->position[3 * $row] == $token) && ($this->position[3 * $row + 1] == $token) && ($this->position[3 * $row + 2] == $token)){
                $won = true;
            }
        }

        //verticals:
        for($col = 0; $col < 3; $col++) {
            if(($this->position[1 * $col] == $token) && ($this->position[1 * $col + 3] == $token) && ($this->position[1 * $col + 6] == $token)){
                $won = true;
            }
        }

        //diagonals:
        if (($this->position[0] == $token) &&
            ($this->position[4] == $token) &&
            ($this->position[8] == $token)) {
            $won = true;
        } else if (($this->position[2] == $token) &&
            ($this->position[4] == $token) &&
            ($this->position[6] == $token)) {
            $won = true;
        }

        return $won;
    }

    function display() {
        echo '<table cols="3" style="font-size:large; font-weight:bold">';
        echo '<tr>'; // open first row
        for($pos=0; $pos<9; $pos++) {
            echo $this->show_cell($pos);
            if($pos %3 == 2) echo '</tr><tr>'; // start new row
        }
        echo '</tr>'; // close last row
        echo '</table>';
    }

    function show_cell($which) {
        $token = $this->position[$which];
        // easy case
        if($token != '-') return '<td>' . $token . '</td>';
        // hard case
        $this->newposition = $this->position; // copy original
        $this->newposition[$which] = 'o'; // their move
        $move = implode($this->newposition); // make string from array
        $link = 'http://localhost:4711/comp4711/COMP4711/?board=' . $move; // what we want link to be
        // return cell containing anchor and showing hyphen
        return '<td><a href="' . $link . '">-</a></td>';
    }
}

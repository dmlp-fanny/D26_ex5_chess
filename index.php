<?php 

include 'Piece.php';
include 'Square.php';
include 'Board.php';

function fen2array($fen)
{
    $parts = preg_split('#\s+#', $fen);
    $rows = explode('/', $parts[0]);
 
    $pieces = array();
 
    $y = 8;
    foreach ($rows as $row) {
        $x = 1;
        for ($i = 0; $i < strlen($row); $i++) {
            if (is_numeric($row[$i])) {
                $x += intval($row[$i]);
            } else {
                $pieces[$x][$y] = $row[$i];
                $x++;
            }
        }
        $y--;
    }
 
    return $pieces;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .board .row {
            width: 24em;
            display: flex;
        }
        .board .row > div {
            width: 3em;
            height: 3em;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .board .white {
            background-color: #c2c2c2;
        }
        .board .black {
            background-color: #525252;
        }
    </style>
    <title>Chess</title>
</head>
<body>
<?php 

$positions_on_turn_1 = [
    1 => [8 => 'r', 7 => 'p', 2 => 'P', 1 => 'R'],
    2 => [8 => 'n', 7 => 'p', 2 => 'P', 1 => 'N'],
    3 => [8 => 'b', 7 => 'p', 2 => 'P', 1 => 'B'],
    4 => [8 => 'q', 7 => 'p', 2 => 'P', 1 => 'Q'],
    5 => [8 => 'k', 7 => 'p', 4 => 'P', 1 => 'K'],
    6 => [8 => 'b', 7 => 'p', 2 => 'P', 1 => 'B'],
    7 => [8 => 'n', 7 => 'p', 2 => 'P', 1 => 'N'],
    8 => [8 => 'r', 7 => 'p', 2 => 'P', 1 => 'R'],
];
 
$board_on_turn_1 = new Board($positions_on_turn_1);
echo $board_on_turn_1;

?>

<br>
<!-- <h3>hi</h3> -->
<?php
$pieces_positions1 = fen2array('rnbqkbnr/pppppppp/8/8/4P3/8/PPPP1PPP/RNBQKBNR b KQkq e3');
$pieces_positions1_board = new Board($pieces_positions1);
echo $pieces_positions1_board;

?>

<br>

<?php

$pieces_positions2 = fen2array('rn1qkb1r/1p3ppp/p2pbn2/4p3/4P3/1NN1BP2/PPP3PP/R2QKB1R b KQkq - 0 8');
$pieces_positions2_board = new Board($pieces_positions2);
echo $pieces_positions2_board;

?>
</body>
</html>
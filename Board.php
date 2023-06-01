<?php 

class Board 
{
    public array $currentBoard = [];
    public array $board = [];

    public function __construct ($currentBoard)
    {
        $this->currentBoard = $currentBoard;
        $this->createEmptyBoard();
        $this->updateBoard();
    }

    public function createEmptyBoard ()
    {
        for ($x = 1; $x <= 8; $x++) {
            $this->board[$x] = [];
            for ($y = 1; $y <= 8; $y++) {
                $this->board[$x][$y] = null; 
            };
        };
    }

    public function updateBoard () 
    {
        foreach($this->currentBoard as $x => $subarrays) {
            foreach($subarrays as $y => $piece) {
                $this->board[$x][$y] = $piece;
            }
        }
    }
    
    public function __toString ()
    {
        $div = '<div class="board">';
            foreach ($this->board  as $x => $subarray) 
            { 
                $row = '<div class="row">';
                foreach($subarray as $y => $piece) {
                    $row .= new Square($x, $y, ($piece == null ? null : new Piece($piece)));
                }; 
                $row .= '</div>';
                $div .= $row;
            }
        $div .= '</div>';
        return $div;
    }
}
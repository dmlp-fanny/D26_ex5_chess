<?php

class Square 
{
    public $x_coord = null;
    public $y_coord = null;
    public ?Piece $piece  = null;

    public function __construct ($x, $y, ?Piece $piece = null)
    {
        $this->x_coord = $x;
        $this->y_coord = $y;
        $this->piece = $piece;
    }

    public function isDark () 
    {
        if ($this->x_coord % 2 == 0 && $this->y_coord % 2 == 0) {
            return true;
        } else if ($this->x_coord % 2 !== 0 && $this->y_coord % 2 !== 0) {
            return true;
        } else {
            false;
        }
    }

    public function __toString ()
    {   
        return '<div ' . ($this->isDark() ? 'class="black"' : 'class="white"'). '>' . $this->piece . '</div>';
    }
}
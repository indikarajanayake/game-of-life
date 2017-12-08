<?php
declare(strict_types=1);

namespace indikarajanayake\gameoflife;

use indikarajanayake\gameoflife\Cell;

class Grid
{

    private $width, $height, $cells;


    /**
     * Grid constructor.
     * @param int $width
     * @param int $height
     */
    public function __construct(int $width, int $height)
    {
        $this->width = $width;
        $this->height = $height;
        $this->cells =  $this->generateGridCells();
    }


    private function generateGridCells() : array
    {
        $gridArray = [];
        for ($y = 0; $y <= $this->height; $y++) {
            for ($x = 0; $x <= $this->width; $x++) {
                $alive = rand(0,1) == 1;
               $gridArray[$x][$y] = new Cell($x,$y,$alive);
            }
        }
        return $gridArray;
    }

    public function getCells() : array
    {
        return $this->cells;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }


    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }




}
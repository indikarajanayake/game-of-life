<?php
declare(strict_types = 1);
namespace indikarajanayake\gameoflife;


class GameOfLifeRules
{

    /**
     * Function to get the neighbour cell of the selected cell in the Grid
     * @param Grid $grid
     * @param Cell $cell
     * @return int
     */
    public function getAliveNeighboursCells(Grid $grid, Cell $cell) : int
    {
        $gridHeight = $grid->getHeight();
        $gridWidth = $grid->getWidth();
        $gridCells = $grid->getCells();
        $currentCellX = $cell->getX();
        $currentCellY = $cell->getY();

        $liveNeighbourCellCount = 0;

        for ($y = $currentCellY - 1; $y <= $currentCellY + 1; $y++) {
            if ($y < 0 || $y >= $gridHeight) {
                continue;
            }
            for ($x = $currentCellX - 1; $x <= $currentCellX + 1; $x++) {
                if ($x < 0 || $x >= $gridWidth) {
                    continue;
                }

                if ($x == $cell->getX() && $y == $cell->getY()) {
                    continue;
                }

                /**
                 * @var $cell Cell
                 */
                $cell = $gridCells[$x][$y];
                if ($cell->isLiveStatus()) {
                    $liveNeighbourCellCount++;
                }
            }
        }

        return $liveNeighbourCellCount;
    }


    /**
     * Function to calculate the cell's next life event based on the game of life rules
     * @param Cell $cell
     * @param int $liveCellCount
     * @return Cell
     */
    public function checkTheCellNextLiveState(Cell $cell, int $liveCellCount) : Cell
    {
        //Over crowding or Under crowding
        if (($liveCellCount < 2 || $liveCellCount > 3)) {
            $cell->setNextLiveStatus(false);
        }
        //Come back to life because of healthy live neighbours
        if ((!$cell->isLiveStatus()) && $liveCellCount == 3) {
            $cell->setNextLiveStatus(true);
        }

        return $cell;
    }

}
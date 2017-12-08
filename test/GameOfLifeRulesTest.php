<?php

namespace indikarajanayake\test\gameoflife;

use indikarajanayake\gameoflife\Cell;
use indikarajanayake\gameoflife\GameOfLifeRules;
use indikarajanayake\gameoflife\Grid;

class GameOfLifeRulesTest extends \PHPUnit_Framework_TestCase
{

    public function testCheckTheCornerCellLiveNeighbourCount()
    {
        $gridHeight = 3;
        $gridWidth = 3;

        $grid = new Grid($gridHeight,$gridWidth);
        $cells = $grid->getCells();
        $cellToWatch = null;
        for ($y = 0; $y <= $gridHeight; $y++) {
            for ($x = 0; $x <= $gridWidth; $x++) {
                /**
                 * @var $cell Cell
                 */
                $cell = $cells[$x][$y];
                if($x == 0 && $y == 0){
                    $cellToWatch = $cell;
                    $cell->setLiveStatus(false);
                } else {
                    $cell->setLiveStatus(true);
                }
            }
        }
        $gameOfLifeRules = new GameOfLifeRules();

        $count = $gameOfLifeRules->getAliveNeighboursCells($grid, $cellToWatch);

        $this->assertEquals(3,$count);
    }


    public function testCheckTheMiddleCellLiveNeighbourCount()
    {
        $gridHeight = 3;
        $gridWidth = 3;

        $grid = new Grid($gridHeight,$gridWidth);
        $cells = $grid->getCells();
        $cellToWatch = null;
        for ($y = 0; $y <= $gridHeight; $y++) {
            for ($x = 0; $x <= $gridWidth; $x++) {
                /**
                 * @var $cell Cell
                 */
                $cell = $cells[$x][$y];
                if($x == 1 && $y == 1){
                    $cellToWatch = $cell;
                    $cell->setLiveStatus(false);
                } else {
                    $cell->setLiveStatus(true);
                }
            }
        }
        $gameOfLifeRules = new GameOfLifeRules();

        $count = $gameOfLifeRules->getAliveNeighboursCells($grid, $cellToWatch);

        $this->assertEquals(8,$count);
    }



    public function testOverCrowdingRule()
    {
        $cell = new Cell(1,1,true);
        $gameOfLifeRules = new GameOfLifeRules();

        $nextGenerationCell = $gameOfLifeRules->checkTheCellNextLiveState($cell, 4);
        $nextGenerationCell->moveToNextGeneration();

        $this->assertFalse($nextGenerationCell->isLiveStatus());

    }

    public function testUnderPopulationRule()
    {
        $cell = new Cell(1,1,true);
        $gameOfLifeRules = new GameOfLifeRules();

        $nextGenerationCell = $gameOfLifeRules->checkTheCellNextLiveState($cell, 1);
        $nextGenerationCell->moveToNextGeneration();

        $this->assertFalse($nextGenerationCell->isLiveStatus());

    }

    public function testUnchangeRule()
    {
        $cell = new Cell(1,1,true);
        $gameOfLifeRules = new GameOfLifeRules();

        $nextGenerationCell = $gameOfLifeRules->checkTheCellNextLiveState($cell, 2);
        $nextGenerationCell->moveToNextGeneration();

        $this->assertTrue($nextGenerationCell->isLiveStatus());

    }

    public function testComeToLifeRule()
    {
        $cell = new Cell(1,1,false);
        $gameOfLifeRules = new GameOfLifeRules();

        $nextGenerationCell = $gameOfLifeRules->checkTheCellNextLiveState($cell, 3);
        $nextGenerationCell->moveToNextGeneration();

        $this->assertTrue($nextGenerationCell->isLiveStatus());

    }

}
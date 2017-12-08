<?php
namespace indikarajanayake\gameoflife;
require 'vendor/autoload.php';

use indikarajanayake\gameoflife\Grid;
use indikarajanayake\gameoflife\GameOfLifeRules;

const GRID_HEIGHT = 3;
const GRID_WIDTH = 3;

/**
 * Simple script to render the game of life game in the console.
 */

$grid = new Grid(GRID_HEIGHT,GRID_WIDTH);

$cells = $grid->getCells();

//Initiate the game of life rule class
$gameRule = new GameOfLifeRules();

//Simpel screen to render. TODO:Time limit so done like this way. Please check the test cases;
for ($i=0; $i < 20; $i++) {
    $newGrid = array();

    for ($y = 0; $y <= GRID_HEIGHT; $y++) {
        for ($x = 0; $x <= GRID_WIDTH; $x++) {
            $cell = $cells[$x][$y];
            //get the neighbour count
            $liveCont = $gameRule->getAliveNeighboursCells($grid, $cell);
            //Get the update cell for next generation
            $newStateCell = $gameRule->checkTheCellNextLiveState($cell, $liveCont);
            $newGrid[$x][$y] = $newStateCell;
        }
    }


    $screen = '';
    for ($y = 0; $y <= GRID_HEIGHT; $y++) {
        for ($x = 0; $x <= GRID_WIDTH; $x++) {
            $cell = $newGrid[$x][$y];
            $cell->moveToNextGeneration();
            $screen .= $cell->render();
        }
        $screen .= "\n";
    }

    var_dump($screen);

}

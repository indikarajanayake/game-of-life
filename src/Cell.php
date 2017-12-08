<?php
declare(strict_types=1);

namespace indikarajanayake\gameoflife;

/**
 * Class to represent the cell in the Grid
 * Class Cell
 * @package indikarajanayake\gameoflife
 *
 */
class Cell
{
    private  $x, $y, $liveStatus, $nextLiveStatus;

    /**
     * Cell constructor.
     * @param int $x
     * @param int $y
     * @param bool $liveStatus
     */
    function __construct(int $x, int $y, bool $liveStatus = false) {
        $this->x = $x;
        $this->y = $y;
        $this->liveStatus = $this->nextLiveStatus = $liveStatus;

    }

    public function render() {
        return ($this->liveStatus ? '1' : '0');
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * @return boolean
     */
    public function isLiveStatus(): bool
    {
        return $this->liveStatus;
    }

    /**
     * @param boolean $liveStatus
     */
    public function setLiveStatus(bool $liveStatus)
    {
        $this->liveStatus = $liveStatus;
    }

    /**
     * @return mixed
     */
    public function getNextLiveStatus()
    {
        return $this->nextLiveStatus;
    }

    /**
     * @param mixed $nextLiveStatus
     */
    public function setNextLiveStatus($nextLiveStatus)
    {
        $this->nextLiveStatus = $nextLiveStatus;
    }



    //Function to update the cell live status in next generation
    public function moveToNextGeneration ()
    {
        $this->liveStatus = $this->nextLiveStatus;
    }

}
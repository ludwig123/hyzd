<?php


namespace app\home\domain;


class TimePeriod
{
    private $startTime, $endTime;

    function __construct($startTime, $endTime)
    {
        $this->startTime = $startTime;
        $this->endTime = $endTime;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->endTime;
    }



}
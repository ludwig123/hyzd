<?php


namespace app\home\domain;


class Account
{
    private $start_time, $end_time;

    function __construct($start_time, $end_time)
    {
        $this->start_time = $start_time;
        $this->end_time = $end_time;
    }

    public function getEntries()
    {

    }

    public function entriesUsing($filter)
    {

    }
}
<?php


namespace app\home\domain;


abstract class Filter
{
    abstract function isIncluded();
}
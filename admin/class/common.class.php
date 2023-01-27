<?php


abstract class Common
{
    abstract function save();
    abstract function retrive();
    abstract function edit();
    abstract function delete();

    public function set($key, $value)
    {
        $this->$key = $value;
    }
}
?>
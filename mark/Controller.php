<?php
class Controller
{
    /**
     * action前置执行的全局方法,可继承重构
     */
    public function _before_action()
    {

    }

    public function _after_action()
    {

    }

    public function __call($name, $arguments)
    {
        echo "NOT FOPUND ACTION!";
    }
}
<?php
/**
 *
 */
namespace Zuitu\Rule;

class RuleOp
{
    protected $nameList = null;

    public function init(array $nameList)
    {
        $this->nameList = $nameList;
        return $this;
    }

    /**
     * @param  [type]
     * @param  [type]
     * @param  [type]
     * @return [type]
     */
    public function calc($op, $name, $value)
    {
        return $this->$op($name, $value);
    }

    protected function neq($name, $value)
    {
        $my_value = $this->nameList[$name];
        $ret = false;
        if ($my_value != $value) {
            $ret = true;
        }
        return $ret;
    }

    protected function eq($name, $value)
    {
        $my_value = $this->nameList[$name];
        $ret = false;
        if ($my_value == $value) {
            $ret = true;
        }
        return $ret;
    }

    protected function gt($name, $value)
    {
        $my_value = $this->nameList[$name];
        $ret = false;
        if ($my_value > $value) {
            $ret = true;
        }
        return $ret;
    }

    protected function egt($name, $value)
    {
        $my_value = $this->nameList[$name];
        $ret = false;
        if ($my_value >= $value) {
            $ret = true;
        }
        return $ret;
    }

    protected function lt($name, $value)
    {
        $my_value = $this->nameList[$name];
        $ret = false;
        if ($my_value < $value) {
            $ret = true;
        }
        return $ret;
    }

    protected function elt($name, $value)
    {
        $my_value = $this->nameList[$name];
        $ret = false;
        if ($my_value <= $value) {
            $ret = true;
        }
        return $ret;
    }

    protected function btw($name, $value)
    {
        $my_value = $this->nameList[$name];
        $ret = false;
        list($min, $max) = explode(',', $value);
        if ($my_value >= $min && $my_value <= $max) {
            $ret = true;
        }
        return $ret;
    }

    protected function nbtw($name, $value)
    {
        $my_value = $this->nameList[$name];
        $ret = false;
        list($min, $max) = explode(',', $value);
        if ($my_value <= $min || $my_value >= $max) {
            $ret = true;
        }
        return $ret;
    }

    public function __call($name, $args)
    {
        $ret = false;
        if (1 == ($args[3] - $args[2] + 1) / 2 + $args[4] - 1) {
            $ret = true;
        }
        return $ret;
    }
}

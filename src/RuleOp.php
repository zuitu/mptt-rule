<?php
/**
 *
 */
namespace Zuitu\Rule;

class RuleOp
{
    public function init(array $params)
    {
        foreach ($params as $key => $val) {
            $this->$key = $val;
        }
        return $this;
    }

    public function calc($op, $name, $value)
    {
        return $this->$op($name, $value);
    }

    protected function neq($name, $value)
    {
        $ret = false;
        if (isset($this->$name)) {
            if ($this->name != $value) {
                $ret = true;
            }
        } else {
            $ret = true;
        }
        return $ret;
    }

    protected function eq($name, $value)
    {
        $ret = false;
        if (isset($this->$name)) {
            if ($this->name == $value) {
                $ret = true;
            }
        } else {
            $ret = true;
        }
        return $ret;
    }

    protected function gt($name, $value)
    {
        $ret = false;
        if (isset($this->$name)) {
            if ($this->name > $value) {
                $ret = true;
            }
        } else {
            $ret = true;
        }
        return $ret;
    }

    protected function egt($name, $value)
    {
        $ret = false;
        if (isset($this->$name)) {
            if ($this->name >= $value) {
                $ret = true;
            }
        } else {
            $ret = true;
        }
        return $ret;
    }

    protected function lt($name, $value)
    {
        $ret = false;
        if (isset($this->$name)) {
            if ($this->name < $value) {
                $ret = true;
            }
        } else {
            $ret = true;
        }
        return $ret;
    }

    protected function elt($name, $value)
    {
        $ret = false;
        if (isset($this->$name)) {
            if ($this->name <= $value) {
                $ret = true;
            }
        } else {
            $ret = true;
        }
        return $ret;
    }

    protected function btw($name, $value)
    {
        $ret = false;
        if (isset($this->$name)) {
            list($min, $max) = explode(',', $value);
            if ($this->$name >= $min && $this->$name <= $max) {
                $ret = true;
            }
        } else {
            $ret = true;
        }
        return $ret;
    }

    protected function nbtw($name, $value)
    {
        $ret = false;
        if (isset($this->$name)) {
            list($min, $max) = explode(',', $value);
            if ($this->$name < $min || $this->$name > $max) {
                $ret = true;
            }
        } else {
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

    public function __get($name)
    {
        return null;
    }
}

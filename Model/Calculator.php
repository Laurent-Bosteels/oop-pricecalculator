<?php

class Calculator {
    private $num1;
    private $num2;
    private $operator;
 
    function __construct($num1, $num2, $operator)
    {
        $this->num1 = $num1;
        $this->num2 = $num2;
        $this->operator = $operator;
    }
 
    function calculate() {
        // does the actual calculation
        switch($this->operator) {
            case "add":
                return $this->num1 + $this->num2;
            case "sub":
                return $this->num1 - $this->num2;
            case "mult":
                return $this->num1 * $this->num2;
            case "div":
                return $this->num1 / $this->num2;
            default:
                return "Invalid Operator";
        }
    }
}
 
?>
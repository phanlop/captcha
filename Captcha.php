<?php
class Captcha {
	
	function __construct($mode, $leftOperand, $operator, $rightOperand){
		$this->listNumberWithString = array(1=>"One",2=>"Two",3=>"Three",4=>"Four",5=>"Five",6=>"Six",7=>"Seven",8=>"Eight",9=>"Nine");
		$this->operator = $operator;
		$this->mode = 1;
		$this->rightOperand = $rightOperand;
		$this->leftOperand = $leftOperand;
	}
	
	function toString() {
		return "One + 1";
	}
	
	function getLeftOperand() {
		return $this->listNumberWithString[$this->leftOperand];
	}
	
	function getOperation() {
		switch ($this->operator){
			case 1:
				return "+";
			case 2:
				return "*";
			case 3:
				return "-";
		}

	}
	
	function getRightOperand() {
		return $this->rightOperand;
	}
	
	function getResult() {
		return 2;
	}
}
?>
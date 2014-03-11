<?php
class Captcha {
	
	function __construct($pattern, $leftOperand, $operator, $rightOperand){
		$this->listNumberWithString = array(1=>"One",2=>"Two",3=>"Three",4=>"Four",5=>"Five",6=>"Six",7=>"Seven",8=>"Eight",9=>"Nine");
		$this->operator = $operator;
		$this->pattern = $pattern;
		$this->rightOperand = $rightOperand;
		$this->leftOperand = $leftOperand;
	}
	
	function toString() {
		return "One + 1";
	}
	
	private function getNumberText($number){
		return $this->listNumberWithString[$number];
	}
	private function isLeftTextNumberPattern(){
		return $this->pattern == 1;
	}
	
	function getLeftOperand() {
		return $this->isLeftTextNumberPattern() ? $this->getNumberText($this->leftOperand) : $this->leftOperand;
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
		return $this->isLeftTextNumberPattern() ? $this->rightOperand : $this->getNumberText($this->rightOperand);
	}

	function getResult() {

		switch ($this->operator){
			case 1:
				return $this->leftOperand + $this->rightOperand;
			case 2:
				return $this->leftOperand * $this->rightOperand;
			case 3:
				return $this->leftOperand - $this->rightOperand;
		}
		
	 
	}
}
?>
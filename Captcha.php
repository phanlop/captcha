<?php
class Captcha {
	
	const PLUS = 1;
	const MULTIPLY = 2;
	const MINUS = 3;
		
	function __construct($pattern, $leftOperand, $operator, $rightOperand){
		$this->listNumberWithString = array(1=>"One",2=>"Two",3=>"Three",4=>"Four",5=>"Five",6=>"Six",7=>"Seven",8=>"Eight",9=>"Nine");
		$this->operator = $operator;
		$this->pattern = $pattern;
		$this->rightOperand = $rightOperand;
		$this->leftOperand = $leftOperand;
		
		if($this->operator == self::MINUS && $this->rightOperand > $this->leftOperand){
			throw new InvalidArgumentException('Right operand greater than left operand');
		}
	}
	
	function toString() {
		return $this->getLeftOperand().' '.$this->getOperation().' '.$this->getRightOperand();
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
			case self::PLUS:
				return "+";
			case self::MULTIPLY:
				return "*";
			case self::MINUS:
				return "-";
		}
	}
	
	function getRightOperand() {
		return $this->isLeftTextNumberPattern() ? $this->rightOperand : $this->getNumberText($this->rightOperand);
	}

	function getResult() {
		switch ($this->operator){
			case self::PLUS:
				return $this->leftOperand + $this->rightOperand;
			case self::MULTIPLY:
				return $this->leftOperand * $this->rightOperand;
			case self::MINUS:
				return $this->leftOperand - $this->rightOperand;
		}
		
	 
	}
}
?>
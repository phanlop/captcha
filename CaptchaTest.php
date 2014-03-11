<?php

include "Captcha.php";

class CaptchaTest extends PHPUnit_Framework_TestCase {
	function test1111ShouldReturnOne_Plus_1(){
		$captcha = new Captcha(1,1,1,1);
		$this->assertEquals("One", $captcha->getLeftOperand());
		$this->assertEquals("+", $captcha->getOperation());
		$this->assertEquals("1", $captcha->getRightOperand());
		$this->assertEquals("2", $captcha->getResult());
	}
	
	function testOperatorMultiply(){
		$captcha = new Captcha(1,1,2,1);
		$this->assertEquals("*", $captcha->getOperation());
	}
	
	function testOperatorMinus(){
		$captcha = new Captcha(1,1,3,1);
		$this->assertEquals("-", $captcha->getOperation());
	}
	
	function testRightOperandModeOneShouldReturnNumber(){
		$this->assertEquals("1", (new Captcha(1,1,1,1))->getRightOperand());
		$this->assertEquals("2", (new Captcha(1,1,1,2))->getRightOperand());
		$this->assertEquals("3", (new Captcha(1,1,1,3))->getRightOperand());
		$this->assertEquals("4", (new Captcha(1,1,1,4))->getRightOperand());
		$this->assertEquals("5", (new Captcha(1,1,1,5))->getRightOperand());
		$this->assertEquals("6", (new Captcha(1,1,1,6))->getRightOperand());
		$this->assertEquals("7", (new Captcha(1,1,1,7))->getRightOperand());
		$this->assertEquals("8", (new Captcha(1,1,1,8))->getRightOperand());
		$this->assertEquals("9", (new Captcha(1,1,1,9))->getRightOperand());
	}
	function testLeftOperandModeOneShouldReturnStringOfNumber(){
		$this->assertEquals("One", (new Captcha(1,1,1,1))->getLeftOperand());
		$this->assertEquals("Two", (new Captcha(1,2,1,1))->getLeftOperand());
		$this->assertEquals("Three", (new Captcha(1,3,1,1))->getLeftOperand());
		$this->assertEquals("Four", (new Captcha(1,4,1,1))->getLeftOperand());
		$this->assertEquals("Five", (new Captcha(1,5,1,1))->getLeftOperand());
		$this->assertEquals("Six", (new Captcha(1,6,1,1))->getLeftOperand());
		$this->assertEquals("Seven", (new Captcha(1,7,1,1))->getLeftOperand());
		$this->assertEquals("Eight", (new Captcha(1,8,1,1))->getLeftOperand());
		$this->assertEquals("Nine", (new Captcha(1,9,1,1))->getLeftOperand());
	}
	
	function testRightOperandModeTwoShouldReturnNumber(){
		$this->assertEquals("One", (new Captcha(2,1,1,1))->getRightOperand());
		$this->assertEquals("Two", (new Captcha(2,1,1,2))->getRightOperand());
		$this->assertEquals("Three", (new Captcha(2,1,1,3))->getRightOperand());
		$this->assertEquals("Four", (new Captcha(2,1,1,4))->getRightOperand());
		$this->assertEquals("Five", (new Captcha(2,1,1,5))->getRightOperand());
		$this->assertEquals("Six", (new Captcha(2,1,1,6))->getRightOperand());
		$this->assertEquals("Seven", (new Captcha(2,1,1,7))->getRightOperand());
		$this->assertEquals("Eight", (new Captcha(2,1,1,8))->getRightOperand());
		$this->assertEquals("Nine", (new Captcha(2,1,1,9))->getRightOperand());
	}
	
	function testLeftOperandModeTwoShouldReturnStringOfNumber(){
		$this->assertEquals("1", (new Captcha(2,1,1,1))->getLeftOperand());
		$this->assertEquals("2", (new Captcha(2,2,1,1))->getLeftOperand());
		$this->assertEquals("3", (new Captcha(2,3,1,1))->getLeftOperand());
		$this->assertEquals("4", (new Captcha(2,4,1,1))->getLeftOperand());
		$this->assertEquals("5", (new Captcha(2,5,1,1))->getLeftOperand());
		$this->assertEquals("6", (new Captcha(2,6,1,1))->getLeftOperand());
		$this->assertEquals("7", (new Captcha(2,7,1,1))->getLeftOperand());
		$this->assertEquals("8", (new Captcha(2,8,1,1))->getLeftOperand());
		$this->assertEquals("9", (new Captcha(2,9,1,1))->getLeftOperand());
	}
	function testGetResultPlusOperation() {
		$this->assertEquals(2, (new Captcha(1,1,1,1))->getResult());
		$this->assertEquals(3, (new Captcha(1,2,1,1))->getResult());
		$this->assertEquals(123, (new Captcha(1,23,1,100))->getResult());
	}
	function testGetResultMultiplyOperation() {
		$this->assertEquals(1, (new Captcha(1,1,2,1))->getResult());
	    $this->assertEquals(35, (new Captcha(1,7,2,5))->getResult());
	}
	function testGetResultMinusOperation() {
		$this->assertEquals(0, (new Captcha(1,1,3,1))->getResult());
		$this->assertEquals(5, (new Captcha(1,7,3,2))->getResult());
	}
	
	/**
	* @expectedException InvalidArgumentException
	*/
	function testMinusLeftShouldGreaterThanRightOperand(){
		new Captcha(1,1,3,2);
	}
	
}


?>

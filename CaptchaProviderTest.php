<?php
require_once "Random.php";
require_once "Captcha.php";
require_once "CaptchaProvider.php";

class CaptchaProviderTest extends PHPUnit_Framework_TestCase {
	public function testStub()
	    {
	        
	        $stub = $this->getMock('Random');

	        $stub->expects($this->any())
	             ->method('nextPattern')
	             ->will($this->returnValue(1));
			
	        $stub->expects($this->any())
	             ->method('nextOperand')
	             ->will($this->onConsecutiveCalls(2,1));
			
	        $stub->expects($this->any())
	             ->method('nextOperator')
	             ->will($this->returnValue(2));
			
	        	 //->expects($this->any())
	    
			
			$captchaProvider = new CaptchaProvider();
			$captchaProvider->setRandom($stub);
			$captcha = $captchaProvider->getCaptcha();
	        $this->assertEquals("Two * 1",$captcha->toString());
	    }
		
		public function testPattern()
		{
	        
		    $stub = $this->getMock('Random');

	        $stub->expects($this->any())
	             ->method('nextPattern')
	             ->will($this->returnValue(2));
			
	        $stub->expects($this->any())
	             ->method('nextOperand')
	             ->will($this->onConsecutiveCalls(6,3));
			
	        $stub->expects($this->any())
	             ->method('nextOperator')
	             ->will($this->returnValue(3));
			
			$captchaProvider = new CaptchaProvider();
			$captchaProvider->setRandom($stub);
			$captcha = $captchaProvider->getCaptcha();
		    $this->assertEquals("6 - Three",$captcha->toString());
		 }
		 
		 public function testFullstring(){
 		    $stub = $this->getMock('Random');
			
	        $stub->expects($this->any())
	             ->method('nextPattern')
	             ->will($this->returnValue(2));
			
	        $stub->expects($this->any())
	             ->method('nextOperand')
	             ->will($this->onConsecutiveCalls(3,6));
			
	        $stub->expects($this->any())
	             ->method('nextOperator')
	             ->will($this->returnValue(1));
			
 			$captchaProvider = new CaptchaProvider();
 			$captchaProvider->setRandom($stub);
 			$captcha = $captchaProvider->getCaptcha();
 		    $this->assertEquals("3 + Six",$captcha->toString());
		 }
	}
?>
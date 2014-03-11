<?php
	require_once "Random.php";

	class CaptchaProvider {
		
		function __construct(){
			$this->random = new Random();
		}
		 
		function getCaptcha(){
			$pattern = $this->random->nextPattern();
			$leftOperand = $this->random->nextOperand();
			$operator = $this->random->nextOperator();
			$rightOperand = $this->random->nextOperand();
			return new Captcha($pattern,$leftOperand,$operator,$rightOperand);
		}
		function setRandom($random) {
			$this->random=$random;
		}
	}
?>
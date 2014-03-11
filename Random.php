<?php

class Random {
	
	function next($min, $max){
		return rand($min, $max);
	}
	
	function nextPattern(){
		return rand(1, 2);
	}
	
	function nextOperator(){
		return rand(1, 3);
	}
	
	function nextOperand(){
		return rand(1, 9);
	}
	
}

?>
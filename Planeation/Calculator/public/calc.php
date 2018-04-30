<?php

require '../src/class/FirstCalculator.php';

use Calculator\FirstCalculator;
/**
 * This is the comand try for the division with
 */
try {
/**
 * This are the variables declarated in the system
 * 
 * n1 is the first element or input
 * 
 * n2 is the second element or the secon input
 * 
 * operation is the form
 */
$n1 = (float) $_GET ['first'];
$n2 = (float) $_GET ['second'];
$operation = (integer) $_GET ['operations'];
$message = NULL;

$calc = new FirstCalculator();

$calc->setNumber1($n1);
$calc->setNumber2($n2);

/**
 * This are the principal condicional
 */
if ($operation === 1 )
{
  $message = 'The result of the sumation is: ' . $calc->sum();
}
/**
 * This are the else of the first if for rest of operations
 */
 else if ($operation === 2) {
  $message = 'The result of the rest is: ' . $calc->rest();
} elseif ($operation ===3) {
  $message = 'The result of the multiplication is: ' . $calc->multi();
} elseif ($operation ===4) {
  $message = 'The result of the division is: ' . $calc->div();
}else if ($operation === 5) {
  $message = 'The result of the module is: ' . $calc->mod();
} elseif ($operation ===6) {
  $message = 'The result of the A over B is: ' . $calc->exp();
} elseif ($operation ===7) {
  $message = 'The result of the pow is: ' . $calc->pow();
}else if ($operation === 8) {
  $message = 'The result of the logaritmation is: ' . $calc->log();
} elseif ($operation ===9) {
  $message = 'The result of the squrt is: ' . $calc->sqrt();
} elseif ($operation ===10) {
  $message = 'The result of the squrtInv is: ' . $calc->sqrtInv();
}

/**
 * This is the catch for the verification of error
 * 
 * Also this function has one decision about the problem
 */
} catch (Exception $exc){
   if ($exc-> getCode() === 1){
     $message = $exc->getMessage();
   } else {
     echo 'We has a problem <br>';
     echo $exc->getMessage();
     echo "<br>";
     echo $exc->getTraceAsString();
   }
/**
 * Redirection to the result.php
 */
}finally {
   if ($message !== NULL){
     require 'result.php';   
   }
}


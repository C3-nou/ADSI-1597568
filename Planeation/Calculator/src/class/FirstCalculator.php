<?php

namespace Calculator;

/**
 * Class for show my first exercise in PHP
 *
 * @author Cristian Cadavid <cristiancadavid45@gmail.com>
 * 
 * @package Calculator
 */
class FirstCalculator {
/**
 *
 * @var float
 * 
 * numbers in the opeation
 */
  private $number1;
  private $number2;

  /**
   * 
   * get of number1
   * 
   * return the value of $number1
   */
  function getNumber1() {
    return $this->number1;
  }
/**
   * 
   * get of number2
   * 
   * return the value of $number2
   */
  function getNumber2() {
    return $this->number2;
  }
/**
   * 
   * set of number1
   * 
   * return the value of $number1
   */
  function setNumber1($number1) {
    $this->number1 = $number1;
  }
/**
   * 
   * set of number2
   * 
   * return the value of $number2
   */
  function setNumber2($number2) {
    $this->number2 = $number2;
  }
  /**
   * 
   * Method of the sum of number1 + number2
   */
  public function sum() {
    return $this->number1 + $this->number2;
  }
/**
   * 
   * Method of the rest of number1 - number2
   */
  public function rest() {
    return $this->number1 - $this->number2;
  }
/**
   * 
   * Method of the multi of number1 * number2
   */
  public function multi() {
    return $this->number1 * $this->number2;
  }
/**
   * 
   * Method of the sum of number1 / number2 with one function for no does inexistent opreations 
   */
  public function div(): float {
    if ($this->number2 != 0) {
      return $this->number1 / $this->number2;
    } else {
      throw new \Exception("The division by zero does not exist.", 1);
    }
  }
/**
 * 
 * Method of module of division
 */
  public function mod() {
    return $this->number1 % $this->number2;
  }
/**
 * 
 * Method of elements of pow
 */
  public function exp() {
    return $this->number1 ** $this->number2;
  }
/**
 * 
 * method pow of n1 * n.times n1
 */
  public function pow() {
    return $this->number1 * $this->number1;
  }
/**
 * 
 * method of logaritmation
 */
  public function log() {
    return log($this->number2, $this->number1);
  }
/**
 * 
 * sqrt method
 */
  public function sqrt() {
    return sqrt($this->number1);
  }
/**
 * 
 * sqrt method inv of pow
 */
  public function sqrtInv() {
    return pow($this->number1, (1 / $this->number2));
  }

}

$calc = new FirstCalculator();



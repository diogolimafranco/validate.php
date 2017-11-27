<?php
/**
*
* Author: Diogo Franco <diogo.franco@websocorro.com.br>
* Create: 2017-11-27 12:08
* Classe to validate multiple type data
* 
*/

class Validate {

  // Verifica se o valor é numérico (string, integer ou float)
  public function isNumber ($value) {
    return is_numeric( $value );
  }


  // Verifica se o valor é um número inteiro
  public function isInteger ($value){
    return is_int( $value );
  }


  // Verifica se o valor é um número flutuante
  public function isFloat ($value){
    return is_float( $value );
  }


  // Verifica se o valor é um booleano (true || false)
  public function isBoolean ($value){
    return is_bool( $value );
  }


  // Verifica se a variável é um objeto php
  public function isObject ($var){
    return is_object( $var );
  }


  // Verifica se a vriável é um objeto do tipo DateTime
  public function isDateObject ($var){
    return $var instanceof DateTime;
  }


  // Verifica se a variável é uma constante definida
  public function isConstant ($var){
    return defined( $var );
  }


  // Verifica se a variável informada existe
  public function isDefined ($var){
    return isset( $var );
  }


  // Verifica se o valor é do tipo string
  public function isString ($value){
    return is_string( $value );
  }


  // Verifica se a variável informada é do tipo array
  public function isArray ($value){
    return is_array( $value );
  }


  // Verifica se a variável informada é vazia
  public function isEmpty ($var){
    if ( !$this->isDefined($var) ) {
      return true;
    }

    if ( $this->isString($var) ) {
      return empty( $var );
    }

    if ( $this->isArray($var) ) {
      return count($var) === 0;
    }

    if ( $this->isDateObject($var) ) {
      return false;
    }

    if ( $this->isObject($var) ) {
      $vars = get_object_vars($var);
      return count($vars) === 0;
    }

    return false;
  }


  // Verifica se o valor é um endereço de e-mail válido
  public function isEmail ($value){
    return filter_var( $value, FILTER_VALIDATE_EMAIL ) == false ? false : true;
  }


  // Verifica se o valor é um telefone fixo válido
  public function isPhone ($value){
    if ( !$this->isNumber($value) ) {
      return false;
    }
    return strlen($value) == 10;
  }


  // Verifica se o valor é um telefone celular válido
  public function isCellPhone ($value){
    if ( !$this->isNumber($value) ) {
      return false;
    }

    if (strlen($value) !== 11) {
      return false;
    }

    if ( substr($value, 2, 1) != 9) { // Tem o nono dígito sendo o número 9
      return false;
    }

    return true;
  }


  // Verifica se os dois valores são exatamente iguais
  public function isEqual ($value1, $value2){
    return $value1 === $value2;
  }


  // Verifica se o valor é verdadeiro (checkbox)
  public function isYes ($value){
    return $value == "on";
  }


  // Verifica se o valor é falso (checkbox)
  public function isNo ($value){
    return $value != "on";
  }
}
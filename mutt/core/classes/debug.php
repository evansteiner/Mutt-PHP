<?php

  class debug {
    public static function pVarDump($var){
      echo "<pre>";
      echo var_dump($var);
      echo "</pre>";
    }
  }
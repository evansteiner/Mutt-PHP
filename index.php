<?php
  include 'mutt/config.php';

  //error reporting
  if($errorReporting == 1){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
  }

  //autoloading
  function autoloader($className){
    if(file_exists('mutt/core/classes/'.$className . '.php')) {
      include ('mutt/core/classes/'.$className . '.php');
    }

    if(file_exists('mutt/local/classes/'.$className . '.php')){
      include ('mutt/local/classes/'.$className . '.php');
    }   
  }
  
  spl_autoload_register('autoloader');

  //htmlHeaders
  if($htmlHeader == 1) {
    include 'public/includes/htmlHeader.php';
  }

  //dead-ass simple routing
  $pageObject = new controller();
  $target = $pageObject->target;
  include $target;
  
  //htmlFooters
  if($htmlFooter == 1) {
    include 'public/includes/htmlFooter.php';
  }  
?>
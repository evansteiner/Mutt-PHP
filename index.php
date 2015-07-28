<?php
  include 'mutt/config.php';

  //error reporting
  if($errorReporting == 1){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
  }

  //autoloading
  function autoloader($className){
    if(file_exists('mutt/models/core/classes/'.$className . '.php')) {
      include ('mutt/models/core/classes/'.$className . '.php');
    }

    if(file_exists('mutt/models/local/classes/'.$className . '.php')){
      include ('mutt/models/local/classes/'.$className . '.php');
    } 

    if(file_exists('mutt/controllers/core/'.$className . '.php')) {
      include ('mutt/controllers/core/'.$className . '.php');
    }

    if(file_exists('mutt/controllers/local/'.$className . '.php')){
      include ('mutt/controllers/local/'.$className . '.php');
    }    
  }
  
  spl_autoload_register('autoloader');

  //i need to parse the url string, and then pass that info to a controller. not do it all as one thing.
  //and really, this will mean abandoning the tiered url support.


$aa = new ParseURI();
echo debug::pVarDump($aa);

  //htmlHeaders
  if($htmlHeader == 1) {
    include 'public/includes/htmlHeader.php';
  }

  //dead-ass simple routing
  $uriObject = new ParseURI();
  $target = $uriObject->target;
  $target = ucfirst($target);

  if (class_exists($target . 'Controller')) {
    $controllerClass = $target . 'Controller';
    $pageObject = new $controllerClass;
  }
  else {
    $pageObject = new GenericController();
  }

  echo debug::pVarDump($pageObject);

  include $pageObject->template;



  // $target = $pageObject->target;
  // include $target;
  
  //htmlFooters
  if($htmlFooter == 1) {
    include 'public/includes/htmlFooter.php';
  }  
?>
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

  //dead-ass simple routing
  $method = $_SERVER['REQUEST_METHOD'];
  $request = $_SERVER['REQUEST_URI'];
  if($request != '/' . PROJECT_DIRECTORY) {
    $url = explode(PROJECT_DIRECTORY, $request);
    $target = array_pop($url);
    include $target;
  }
?>
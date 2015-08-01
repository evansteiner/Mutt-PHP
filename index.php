<?php

  include 'mutt/config.php';

  //autoloading
  include 'vendor/autoload.php';


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


  //cookies
  if(isset($_GET['deleteAllCookies'])) {
    Cookie::deleteAllCookies("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
  }

  if(isset($_GET['addCookie'])) {
    Cookie::setCookie("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
  }

  //log management 
  if(isset($_GET['deletePhpErrorLog'])) {
    Log::deletePhpErrorLog("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
  }

  if(isset($_GET['writeLocalLog'])) {
    Log::writeLocalLog("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
  }

  if(isset($_GET['deleteLocalLog'])) {
    Log::deleteLocalLog("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
  }

  //error reporting
  if($errorReporting == 1){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
  }

  //routing for controller
  $uriObject = new ParseURI();
  $target = $uriObject->target;
  $target = ucfirst($target);

  if (class_exists($target . 'Controller')) {
    $controllerClass = $target . 'Controller';
    $pageObject = new $controllerClass;
  }
  else {
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
    include 'mutt/views/errors/404error.php';
    exit();
  }


  //htmlHeaders
  if($htmlHeader == 1) {
    include 'mutt/includes/htmlHeader.php';
  }

  //profiler
  if($showProfiler == 1){
    include 'mutt/includes/profiler.php';
  }

  //page template
  include $pageObject->template;
  
  //htmlFooters
  if($htmlFooter == 1) {
    include 'mutt/includes/htmlFooter.php';
  }  


?>
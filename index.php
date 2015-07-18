<h1>Welcome to Mutt-PHP!</h1>
<?php
  include 'mutt/config.php';

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
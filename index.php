<h1>Welcome to Mutt-PHP!</h1>
<?php
  include 'mutt/config.php';

  //dead-ass simple routing
  $method = $_SERVER['REQUEST_METHOD'];
  $request = $_SERVER['REQUEST_URI'];
  if($request != '/' . PROJECT_DIRECTORY) {
    $url = explode(PROJECT_DIRECTORY, $request);
    $target = array_pop($url);
    include $target;
  }
?>

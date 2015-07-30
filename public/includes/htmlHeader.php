<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php
      echo $pageObject->getTitle();

      if($jQueryHeader == 1) {
        include 'public/includes/jQuery.php';
      }    
      if($twitterBootstrap == 1) {
        include 'public/includes/twitterBootstrapHeader.php';
      }
      if($baseStylesFile == 1) {
        $server = $_SERVER['SERVER_NAME'] . '/' . PROJECT_DIRECTORY;
        if($randomizeBaseCssString == 1) {
          $random = rand(1, 10000);
          echo '<link rel="stylesheet" href="http://' . $server . 'public/css/styles.css?'.$random.'">';
        }
        else {
          echo '<link rel="stylesheet" href="http://' . $server . 'public/css/styles.css">';
        }
      }
    ?>

  </head>
  <body>
<?php
  if($showProfiler == 1){
    include 'public/includes/profiler.php';
  }
?>
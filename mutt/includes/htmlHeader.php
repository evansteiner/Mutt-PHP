<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php
      echo $pageObject->getTitle();

      if($jQueryHeader == 1) {
        include 'mutt/includes/jQuery.php';
      }    
      if($twitterBootstrap == 1) {
        include 'mutt/includes/twitterBootstrapHeader.php';
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

      if($baseJSFile == 1) {
        $server = $_SERVER['SERVER_NAME'] . '/' . PROJECT_DIRECTORY;
        if($randomizeBaseJSString == 1) {
          $random = rand(1, 10000);
          echo '<script type="text/javascript" src="http://' . $server . 'public/js/scripts.js?'.$random.'"></script>';
        }
        else {
          echo '<script type="text/javascript" src="http://' . $server . 'public/js/scripts.js"></script>';
        }
      }
      }
    ?>

  </head>
  <body>
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
      if($twitterBootstap == 1) {
        include 'public/includes/twitterBootstrapHeader.php';
      }
      if($baseStylesFile == 1) {
        $server = $_SERVER['SERVER_NAME'] . '/' . PROJECT_DIRECTORY;
        echo '<link rel="stylesheet" href="http://' . $server . 'public/css/styles.css">';
      }
    ?>

  </head>
  <body>

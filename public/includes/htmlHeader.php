<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php
      // if(isset($pageObject->pageTitle)){
      //   echo "<title>$pageObject->pageTitle;</title>";
      // }
      echo $pageObject->getTitle();
      if($jQueryHeader == 1) {
        include 'public/includes/jQuery.php';
      }    
      if($twitterBootstap == 1) {
        include 'public/includes/twitterBootstrapHeader.php';
      }
    ?>
  </head>
  <body>

<div>
  PROJECT_DIRECTORY = <?php echo PROJECT_DIRECTORY; ?>
  <br>
  LOG_DIRECTORY = <?php echo LOG_DIRECTORY; ?>
  <br>
  LOG_FILE = <?php echo '<a href="http://' . $_SERVER["SERVER_NAME"] . '/' . PROJECT_DIRECTORY . LOG_DIRECTORY . LOG_FILE . '" target = "_blank">' . LOG_FILE . '</a>'; ?>
  <br>
  $errorReporting = <?php echo $errorReporting; ?>
  <br>
  $twitterBootstrap = <?php echo $twitterBootstrap; ?>
  <br>
  $jQueryHeader = <?php echo $jQueryHeader; ?>
  <br>
  $jQueryFooter = <?php echo $jQueryFooter; ?>
  <br>
  $randomizeBaseCssString = <?php echo $randomizeBaseCssString; ?>
</div>
<style>
  .profiler {
    border: 1px solid;
    background: #F5F5F0;
    overflow: hidden;
    max-width: 940px;
    margin-left: auto;
    margin-right: auto;
    padding: 10px;
    margin-top: 10px;
  }
</style>

<div class="profiler">
    <div style="float: left;">
      <pre>
        PROJECT_DIRECTORY = <?php echo PROJECT_DIRECTORY; ?>

        LOG_DIRECTORY = <?php echo LOG_DIRECTORY; ?>

        LOG_FILE = <?php echo '<a href="http://' . $_SERVER["SERVER_NAME"] . '/' . PROJECT_DIRECTORY . LOG_DIRECTORY . LOG_FILE . '" target = "_blank">' . LOG_FILE . '</a>'; ?>
        
        $errorReporting = <?php echo $errorReporting; ?>

        $twitterBootstrap = <?php echo $twitterBootstrap; ?>

        $jQueryHeader = <?php echo $jQueryHeader; ?>

        $jQueryFooter = <?php echo $jQueryFooter; ?>

        $randomizeBaseCssString = <?php echo $randomizeBaseCssString; ?>
     </pre>
  </div>
  <div style="float: right;">
    <?php
      debug::pVarDump($pageObject);
    ?>
  </div>  
</div>
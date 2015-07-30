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
    <div><a href="#" onclick="toggle('variables')">VARIABLES</a></div>
    <div id="variables" style="display: none;">
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
  <div><a href="#" onclick="toggle('pageObject')">PAGE OBJECT</a></div>
  <div id="pageObject" style="display: none;">
    <?php
      debug::pVarDump($pageObject);
    ?>
  </div>  
</div>

<script>
  function toggle(obj) {
    var el = document.getElementById(obj);
    el.style.display = (el.style.display != 'none' ? 'none' : '' );
  }
</script>
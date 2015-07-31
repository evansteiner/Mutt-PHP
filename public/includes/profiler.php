<style>
  .profiler {
    border: 1px solid #CCC;
    background: #F5F5F5;
    overflow: hidden;
    max-width: 940px;
    margin-left: auto;
    margin-right: auto;
    padding: 10px;
    margin-top: 10px;
    font-family: courier;
    font-size: 12px;
  }

  .profiler .category {
    color: #337AB7;
    cursor: pointer; cursor: hand;

  }

  .profiler pre {
    font-size: 12px;
  }
</style>

<div class="profiler">
    <div class="category" onclick="toggle('variables')">VARIABLES</div>
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
  <div class="category" onclick="toggle('pageObject')">PAGE OBJECT</div>
  <div id="pageObject" style="display: none;">
    <?php
      debug::pVarDump($pageObject);
    ?>
  </div> 

  <div class="category" onclick="toggle('post')">POST</div>
  <div id="post" style="display: none;">
    <?php
      debug::pVarDump($_POST);
    ?>
  </div>   

  <div class="category" onclick="toggle('cookies')">COOKIES</div>
  <div id="cookies" style="display: none;">
    <?php
      debug::pVarDump($_COOKIE);
    ?>
    Add a cookie:
    <form method="post" action="?addCookie">
      <input type='text' name="cookieName" placeholder="Name">
      <input type='text' name="cookieValue" placeholder="Value">
      <input type='text' name="cookieDuration" placeholder="Duration (seconds)">
      <input type='text' name="cookieDomain" placeholder="Domain" value="/">
      <input type="submit" value="create">
    </form>
    <a href="?deleteAllCookies">Delete all cookies on this domain</a>
  </div> 

  <div class="category" onclick="toggle('common')">COMMON</div>
  <div id="common" style="display: none;">
    <div>DATABASE</div>
    <ul>
      <li>"INSERT INTO names (first, last) VALUES ('john', 'doe')"</li>
    </ul>
  </div>  


</div>
<script>
  function toggle(obj) {
    var el = document.getElementById(obj);
    el.style.display = (el.style.display != 'none' ? 'none' : '' );
  }
</script>
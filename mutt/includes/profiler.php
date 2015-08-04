<script>

  function toggle(obj) {
    var el = document.getElementById(obj);
    el.style.display = (el.style.display != 'none' ? 'none' : '' );
  }

  function deleteLocalLog() {
    var xmlhttp;
    var submissionURL = "<?php echo $pageObject->baseRoute . '?deleteLocalLog' ?>";
    xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET", "http://" + submissionURL, true);
    xmlhttp.send();
  }

  function submitLog() {
    var xmlhttp;
    var submissionURL = "<?php echo $pageObject->baseRoute . '?writeLocalLog' ?>";
    xmlhttp=new XMLHttpRequest();
    xmlhttp.open("POST", "http://" + submissionURL, true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("log=" + document.getElementById('logText').value);
    xmlhttp.onload = function() {
        document.getElementById('logText').value="";
    } 
  }

  function deletePhpErrorLog() {
    var xmlhttp;
    var submissionURL = "<?php echo $pageObject->baseRoute . '?deletePhpErrorLog' ?>";
    xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET", "http://" + submissionURL, true);
    xmlhttp.send();
    xmlhttp.onload = function() {
        location.reload();
    }
  }

  function addCookie() {
    var xmlhttp;
    var submissionURL = "<?php echo $pageObject->baseRoute . '?addCookie' ?>";
    xmlhttp=new XMLHttpRequest();
    xmlhttp.open("POST", "http://" + submissionURL, true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    var cookieName = document.getElementById('cookieName').value;
    var cookieValue = document.getElementById('cookieValue').value;
    var cookieDuration = document.getElementById('cookieDuration').value;
    var cookieDomain = document.getElementById('cookieDomain').value;
    xmlhttp.send("cookieName=" + cookieName + "&cookieValue=" + cookieValue + "&cookieDuration=" + cookieDuration + "&cookieDomain=" + cookieDomain);
    xmlhttp.onload = function() {
        document.getElementById('cookieName').value="";
        document.getElementById('cookieValue').value="";
        document.getElementById('cookieDuration').value="";
        location.reload();
    }
  }

  function deleteAllCookies() {
    var xmlhttp;
    var submissionURL = "<?php echo $pageObject->baseRoute . '?deleteAllCookies' ?>";
    xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET", "http://" + submissionURL, true);
    xmlhttp.send();
    xmlhttp.onload = function() {
        location.reload();
    }   
  }
</script>

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
    color: #23527C;
    cursor: pointer; cursor: hand;

  }

  .profiler .profilerContent {
    margin-left: 20px;
  }

  .profiler pre {
    font-size: 12px;
  }
</style>

<div class="profiler">
    <div class="category" onclick="toggle('variables')">FRAMEWORK VARIABLES</div>
    <div class="profilerContent" id="variables" style="display: none;">
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
  <div class="profilerContent" id="pageObject" style="display: none;">
    <?php
      Debug::pVarDump($pageObject);
    ?>
  </div>   

  <div class="category" onclick="toggle('post')">POST</div>
  <div class="profilerContent" id="post" style="display: none;">
    <?php
      Debug::pVarDump($_POST);
    ?>
  </div>   

  <div class="category" onclick="toggle('cookies')">COOKIES</div>
  <div class="profilerContent" id="cookies" style="display: none;">
    <?php
      Debug::pVarDump($_COOKIE);
    ?>
      <input type='text' id="cookieName" placeholder="Name">
      <input type='text' id="cookieValue" placeholder="Value">
      <input type='text' id="cookieDuration" placeholder="Duration (seconds)">
      <input type='text' id="cookieDomain" placeholder="Domain" value="/">
      <button onclick="addCookie()">Add Cookie</button>
      <button onclick="deleteAllCookies()">Delete Cookies</button>
  </div> 

  <div class="category" onclick="toggle('logs')">LOGS</div>
  <div class="profilerContent" id="logs" style="display: none;">
    <div>ERROR LOG</div>
    <pre>
<?php echo Log::getPhpErrorLog(); ?>
    </pre>
    <button onclick="deletePhpErrorLog();">Delete PHP error log</button>
    <br><br>
    <input id="logText" type='text' name="log" style="width: 50%;">
    <button onclick="submitLog();">Write</button>
    <button onclick="deleteLocalLog();">Delete local log</button>
    <br>
    <?php echo '<a href="http://' . $_SERVER["SERVER_NAME"] . '/' . PROJECT_DIRECTORY . LOG_DIRECTORY . LOG_FILE . '" target = "_blank">Open local log</a>'; ?>
  </div>  

  <div class="category" onclick="toggle('common')">COMMON</div>
  <div class="profilerContent" id="common" style="display: none;">
    <div>DATABASE</div>
    $connection = new Database;
    <ul>
      <li>$result = $connection->query("INSERT INTO names (first, last) VALUES ('john', 'doe')");</li>
      <li>$result = $connection->fetchRow("SELECT * FROM people WHERE first_name = 'john'");</li>
      <li>$result = $connection->fetchAll("SELECT * FROM people");</li>
    </ul>
  </div>  


</div>
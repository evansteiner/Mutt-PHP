<div class = "demoPage">
  <h1>Welcome to Mutt-PHP!</h1>

  <h2>Getting Started</h2>

  <h3>Install Dependencies</h3>
  <p>Mutt-PHP use <a href="https://getcomposer.org/" target="_blank">Composer</a> to manage dependencies. To install the required dependencies, use:</p>
  <ul>
    <li><code>curl -sS https://getcomposer.org/installer | php</code></li>
    <li><code>php composer.phar install</code></li>
  </ul>
  <h3>Set Up config.php</h3>
  <p>Basic project-level config options are set in mutt/config.php. A fresh project contains config.sample in the same directory to act as a template. You should copy or rename this file to config.php.</p>
  <p>
  Config options include: 
    <ul>
      <li>project directory</li>
      <li>log directory</li>
      <li>log name</li>
      <li>error reporting toggle</li>
      <li>inclusion of HTML header</li>
      <li>inclusion of HTML footer</li>
      <li>inclusion of Twitter Bootstrap</li>
      <li>inclusion of jQuery (header)</li>
      <li>inclusion of jQuery (footer)</li>
      <li>inclusion of a base styles.css file</li>
    </ul>
  </p>
  
  <h2>HTML Headers and Footers</h2>
  <p>Mutt-PHP has a generic HTML scaffold (header and footer) which can be toggled in the config. These include options for Twitter Bootstrap and header/footer loading of jQuery (loaded via public CDN).</p>
  <ul>
    <li>CSS v3.3.5</li>
    <li>JS v3.3.5</li>
    <li>jQuery v1.11.3</li>
  </ul>
  
  <h2>Autoloading</h2>
  <p>Mutt-PHP supports very basic autoloading of core and local classes. To utelize autoloading, use one class per class file, named [className].php.</p>
  
  <h2>Models</h2>
  
  <h3 class="indent-1">Core Classes</h3>
  <p class="indent-1">Core classes are implicit to the Mutt-PHP framework. You can extend core classes, but you should not directly modify them for your project. These classes live in mutt/core/classes.</p>
  
  <h3 class="indent-1">Local Classes</h3>
  <p class="indent-1">Local classes are where your project specific classes live. These classes should go in mutt/local/classes.</p>
  
  <h2>Routing</h2>
  <p>Mutt-PHP bootstraps everything through the index.php file and then uses controllers to build pages. The basic breakdown of the URL to routes is:</p>
  <p><code>{base_url}/{project_folder}/{template}</code></p>
  <p>After the template, Mutt-PHP will process the remainder of the URI as:</p>
  <p><code>{base_url}/{project_folder}/{template}/PROPERTY_NAME_1/PROPERTY_VALUE_1/PROPERTY_NAME_2/PROPERTY_VALUE_2/etc...</code></p>
  <p>It will then take those names/values and return as an array in the page object for easy use. If you want to do something different with how these parameters are handled, you can just extend new functionality in the local controller.</p>
  <p>Query strings are processed in a similar manner and returned as part of the page object as well.</p>
  
  <h2>Controllers</h2>
  <p>Once a URI has been broken down, Mutt-PHP processes them through a controller to determine what page data to load. <i>All pages will require a controller to load properly.</i> Mutt-PHP comes with a <code>GenericController()</code> class which must be extended when adding new pages. To ensure proper autoloading, your custom controllers should always follow the <code>[Pagename]Controller</code> naming convention. Custom controllers should be added to mutt/controllers/local/.</p  >
<p>Since local controllers are all extensions of a core controller class, you can really add whatever properties you want to them. However, each local controller should have a template defined at a minimum (and a title if being used for an   HTML project):</p>
  <pre>
    class DemoController extends GenericController {
  
      var $pageTitle;
      
      function __construct() {
        parent::__construct();
        $this->template = 'mutt/views/demo.php';
        $this->pageTitle = 'Welcome To Mutt-PHP';
      }
    }
  </pre>
  <p>Once a controller fully executes, a $pageObject will be generated that contains (among other things) easy access to data from the controller.  Effective use of the $pageObject is a core concept when using Mutt-PHP. It is important to recognize that the $pageObject is not available until we're in a post-controller state. Much of the same info is available in the controller layer, but must be accessed without the $pageObject. For example, $pageObject->parameters['value1'] in the VIEW layer is analogous to $this->parameters['value1'] in the controller layer.</p>


  <p>If a controller cannot be found for requested URI, Mutt-PHP will return a 404 response.</p>
  
  <h2>Views</h2>
  <p>Mutt-PHP doesn't support a specific templating engine out-of-the-box, but there's no reason you couldn't add one.</p>
  <p>View files should be placed in mutt/views/ and then be pointed to from a page controller.</p>
  
  <h2>Database</h2>
  <p>Mutt-PHP supports slightly abstracted mySQLi functions through the <code>Database()</code> class. At this time, it only supports a single database connection out-of-the-box, although you could extend the class with multiple connections if needed. Connection details shoudl be supplied in config.php</p>
  <p>Sample useage:</p>
  <p>
    <pre>
      
      $connection = new Database;
      $connection->query("INSERT INTO names (first, last) VALUES ('john', 'doe')");
    </pre>
  </p>

<h2>HTTP Requests</h2>
<p>Mutt-PHP provides a simeple <code>HttpRequest</code> class for basic HTTP transactions. If we assume that <code>$url</code> is the URL that we want to post to, and that <code>$data</code> is an array of the post data we want to send ($key => $value), then:</p>
<pre>
$request = new HttpRequest;
$result = $request->post($url, $data);
</pre>
<p>The above will post to the provided URL and then return an array of whatever headers come back. </p>
<p>Alternatively, if you're using jQuery, it's often to just use that to post: </p>
  <pre>
    $.ajax({
        type: 'POST',
        url: "FrameworkActions/writeLocalLog",
        data: { 
            'log': 'this is my log message', 
        },
        success: function(msg){
            alert('success!';
        }
    });
  }
  </pre>

  <h2>Logging</h2>
  <p><code>Log::write('This is my logged message.');</code></p>
  <p>Mutt-PHP has native support for basic logging. Log name and directory can be set in config.php.</p>
  
  <h2>Debugging Tools</h2>
  <h3 class="indent-1">Profiler</h3>
  <p class="indent-1">Mutt-PHP comes with a built in profiler.</p>

  <h3 class="indent-1">Debug::pVarDump($var)</h3>
  <p class="indent-1">Format var_dump for readability:</p>
  <p class="indent-1">
    <?php
      $a = new stdCLass();
      $a->firtName = "John";
      $a->lastName = "Doe";
      Debug::pVarDump($a);
    ?>
  </p>
  
  <h2>Dates and Times</h2>
  <p>Mutt-PHP supports a variety of time() manipulations through the moment class, most of which are just obfuscations of date() broken into a different syntax, with a little modularity to faciliate date math.</p>
  <p>If we assume that <code>$moment = new Moment()</code>, then:</p>
  <pre>
    <?php
    $moment = new Moment();
    echo '<p>'.$moment->nowMMDDYYYY(). ' //echo $moment->nowMMDDYYYY();</p>';
    echo '<p>'.$moment->nowYYYYMMDD(). ' //echo $moment->nowYYYYMMDD();</p>';
    echo '<p>'.$moment->nowTimestamp(). ' //echo $moment->nowTimestamp();</p>';
    ?>
  </pre>

  <h2>Emailing</h2>
  <p>Mutt-PHP uses PHPMailer as a more robust alternative to mail(). The package is included as a composer dependency. Gor more infomation see <a href="https://github.com/PHPMailer/PHPMailer">PHPMailer on github</a>. Basic useage: </p>
  <pre>
  
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'user@example.com';                 // SMTP username
$mail->Password = 'secret';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->From = 'from@example.com';
$mail->FromName = 'Mailer';
$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
  </pre>  
  
  <h2>Troubleshooting</h2>
  <h3 class="indent-1">500 Errors</h3>
  <p class="indent-1">If you are getting a 500 error immediately after starting a new project, ensure that you're file permissions are correct. 755 is a good place to start.</p>

  <h3 class="indent-1">Request Problems</h3>
  <p class="indent-1">Since Mutt-PHP relies on bootstrapping, the .htaccess file will attempt to route all requests through index.php and look for appropriate controllers. This can be problematic if you're trying to link to a file which is in a traditional hierarchical location, such as css of js files. To account for this, you should exclude any files types that you don't want routed through a controller via the .htaccess file. The default exclusions are: js, ico, txt, gif, jpg, png, and css</p>
</div>

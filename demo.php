<h1>Welcome to Mutt-PHP!</h1>

<h2>config.php</h2>
<p>Basic project-level config options are set in mutt/config.php. A fresh project contains config.sample in the same directory to act as a template.</p>
<p>
Config options include: 
  <ul>
    <li>project directory</li>
    <li>error reporting toggle</li>
  </ul>
</p>

<h2>Routing</h2>
<p>Mutt-PHP bootstraps all pages through index.php and makes use of very simple directory-based routing system. Instead of relying on an actual controller, Mutt-PHP supports an old-school directory location URL schema.</p>

<h2>Autoloading</h2>
<p>Mutt-PHP supports very basic autoloading of core and local classes. To utelize autoloading, use one class per class file, named [className].php.</p>

<h2>Core Classes</h2>
<p><?php echo coreClassDemo::validate(); ?></p>
<p>Core classes are implicit to the Mutt-PHP framework. You can extend core classes, but you should not directly modify them for your project. These classes live in mutt/core/classes.</p>

<h2>Local Classes</h2>
<p><?php echo localClassDemo::validate(); ?></p>
<p>Local classes are where your project specific live. These classes should go in mutt/local/classes.</p>

<h2>Logging</h2>
<?php echo __FILE__; ?>
<h3>log::write('This is my logged message.');</h3>
<p>Mutt-PHP has native support for basic logging. Log name and directory can be set in config.php.</p>
<?php log::write('This is my logged message.'); ?>

<h2>Debugging Tools</h2>
<h3>debug::pVarDump($var)</h3>
<p>Format var_dump for readability:</p>
<p>
  <?php
    $a = new stdCLass();
    $a->firtName = "John";
    $a->lastName = "Doe";
    debug::pVarDump($a);
  ?>
</p>
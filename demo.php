<h1>Welcome to Mutt-PHP!</h1>

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


<?php

  class DemoController extends GenericController {

    // var $method;
    // var $request;
    // var $template;
    var $pageTitle;
    
    function __construct() {
      parent::__construct();
      $this->template = 'mutt/views/demo.php';
      $this->pageTitle = 'Welcome To Mutt-PHP';
    }
  }
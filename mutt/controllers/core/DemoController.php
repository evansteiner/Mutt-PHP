<?php

  class DemoController extends GenericController {

    var $method;
    var $request;
    var $template;
    var $pageTitle;
    
    function __construct() {
      $this->method = $_SERVER['REQUEST_METHOD'];
      $this->request = $_SERVER['REQUEST_URI'];
      $this->template = 'mutt/views/demo.php';
      $this->pageTitle = 'Welcome To Mutt-PHP';
    }
  }
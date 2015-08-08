<?php

  class IndexController extends GenericController {

    var $pageTitle;
    
    function __construct() {
      parent::__construct();
      $this->template = 'mutt/views/index.php';
      $this->pageTitle = 'Welcome To Mutt-PHP';
    }
  }
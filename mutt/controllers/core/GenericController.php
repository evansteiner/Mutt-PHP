<?php

  class GenericController {

    var $method;
    var $request;
    var $template;

    function __construct() {
      $this->method = $_SERVER['REQUEST_METHOD'];
      $this->request = $_SERVER['REQUEST_URI'];
      $this->template = 'mutt/views/error.php';
    }
  }
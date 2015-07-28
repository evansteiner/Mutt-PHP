<?php

  class GenericController {

    var $method;
    var $request;
    var $template;

    function __construct() {
      $this->method = $_SERVER['REQUEST_METHOD'];
      $this->request = $_SERVER['REQUEST_URI'];
      $this->template = '';
    }

    function getTitle() {
      if(isset($this->pageTitle)){
        $title = "<title>$this->pageTitle</title>";
        return $title;
      }
      else {
        return false;
      }
    }

  }
<?php

  class controller {

    var $method;
    var $request;
    var $target;

    function __construct() {
      $this->method = $_SERVER['REQUEST_METHOD'];
      $this->request = $_SERVER['REQUEST_URI'];
      $this->target = $this->translateURI();
    }

    function translateURI() {
      $request = $this->request;
      if($request != '/' . PROJECT_DIRECTORY) {
        $url = explode(PROJECT_DIRECTORY, $request);
        $target = array_pop($url);
        return PROJECT_DIRECTORY.'views/'.$target;
      }  
    }
  }
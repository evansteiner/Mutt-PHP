<?php

  class ParseURI {
    var $method;
    var $request;
    var $target;
    var $parameters;

    function __construct() {
      $this->method = $_SERVER['REQUEST_METHOD'];
      $this->request = $_SERVER['REQUEST_URI'];
      $this->target = $this->getTarget();
      $this->parameters = '';
    }

    function getTarget() {
      $request = $this->request;
      if($request != '/' . PROJECT_DIRECTORY) {
        $uri = str_replace('/' . PROJECT_DIRECTORY, '', $request);
        $uriArray = explode('/', $uri);
        $target = $uriArray[0];

        //strip out any query strings
        if(strpos($target, '?')) {
          $target = substr($target, 0, strpos($target, "?"));
        }
        return $target;
      }
      else {
        return "index";
      }  
    }
  }
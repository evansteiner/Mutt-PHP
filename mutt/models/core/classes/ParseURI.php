<?php

  class ParseURI {

    var $method;
    var $scheme;
    var $host;
    var $path;
    var $target;
    var $parameters = NULL;
    var $query = NULL;

    function __construct() {
      $this->method = $_SERVER['REQUEST_METHOD'];
      $this->deconstructURI();
      $this->parameters = $this->getAllParameters();
    }
    
    function deconstructURI() {
      //todo: add https detection support
      $uri = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      $uriParse = parse_url($uri);
      $this->scheme = $uriParse['scheme']; 
      $this->host = $uriParse['host']; 
      $this->path = $uriParse['path']; 
      $this->target = $this->getTarget();
      $this->parameters = "";
      
      if(isset($uriParse['query'])) {
        $this->query = $uriParse['query'];
      }
    }

    function getTarget() {
      $path = trim($this->path, '/');
      if($path != trim(PROJECT_DIRECTORY, '/')) {
        $pathArray = explode("/",$path);
        if($pathArray[0] == trim(PROJECT_DIRECTORY, '/')){
          return $pathArray[1];
        }
        else {
          return $pathArray[0];
        }
      }
      else {
        return 'index';
      }
    }

    function getAllParameters() {
      $path = trim($this->path, '/');
      $pathArray = explode('/', $path);


      //remove the folder path if it exists
      if(array_key_exists(0, $pathArray)){
        if($pathArray[0] == trim(PROJECT_DIRECTORY, '/')) {
          unset($pathArray[0]);
          $pathArray = array_values($pathArray);
        }
      }

      //remove the target if it's next
      if(array_key_exists(0, $pathArray)){
        if($pathArray[0] == $this->target) {
          unset($pathArray[0]);
          $pathArray = array_values($pathArray);
        }
      }
      
      $paramArray = array();

      $count = count($pathArray);
      while($count > 0) {

        //account for a missing parameter
        if(!isset($pathArray[1])) {
          $pathArray[1] = NULL;
        }

        $paramArray[$pathArray[0]] = $pathArray[1];
        unset($pathArray[0]);
        unset($pathArray[1]);
        $pathArray = array_values($pathArray);
        $count = count($pathArray);
      }

      return $paramArray;
    }

  }
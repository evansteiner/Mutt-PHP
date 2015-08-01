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
      $this->parameters = $this->getAllParameters();
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

    function getAllParameters() {
      $request = $this->request;

      //strip out any query strings
      if(strpos($request, '?')) {
        $request = substr($request, 0, strpos($request, "?"));
      }

      //remove trailing slashes
      $request = rtrim($request, "/");

      if($request != '/' . PROJECT_DIRECTORY) {
        $uri = str_replace('/' . PROJECT_DIRECTORY, '', $request);
        $uriArray = explode('/', $uri);
        unset($uriArray[0]);
        $uriArray = array_values($uriArray);
        $parameterArray = array();
        $count = count($uriArray);
        while($count > 0) {

          //account for a missing parameter
          if(!isset($uriArray[1])) {
            $uriArray[1] = NULL;
          }

          $parameterArray[$uriArray[0]] = $uriArray[1];
          unset($uriArray[0]);
          unset($uriArray[1]);
          $uriArray = array_values($uriArray);
          $count = count($uriArray);
        }
       }
      return $parameterArray;
    }

    function getParameter($paramName) {
      $parameterArray = $this->getAllParameters();
      return $parameterArray[$paramName];
      
    }
  }
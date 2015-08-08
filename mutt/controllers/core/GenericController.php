<?php

  class GenericController {

    var $method;
    var $request;
    var $template;
    var $parameters;
    var $query;
    var $baseRoute;
    var $uriObject;

    function __construct() {
      $this->uriObject = new ParseURI();
      $this->method = $_SERVER['REQUEST_METHOD'];
      $this->request = $_SERVER['REQUEST_URI'];
      $this->template = '';
      $this->parameters = $this->getUriParameters();
      $this->query = $this->parseQuery();
      $this->baseRoute = $this->getBaseRoute();
    }

    function getUriParameters() {
      return $this->uriObject->parameters;
    }

    function getBaseRoute() {
      $host = $this->uriObject->host;
      $target = $this->uriObject->target;
      if(PROJECT_DIRECTORY !='') {
        $baseRoute = $host . '/' . trim(PROJECT_DIRECTORY, '/');
      }
      else {
        $baseRoute = $host;
      }
      return $baseRoute;
    }

    function getQuery() {
      return $this->uriObject->query;   
    }

    function parseQuery() {
      $queryString = $this->getQuery();
      parse_str($queryString, $queryArray);
      return $queryArray;
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

    function getParameter($paramName) {
      if(isset($this->parameters[$paramName])) {
        return $this->parameters[$paramName];
      }
      else {
        return "([$paramName] parameter not found)";
      }
    }
  }
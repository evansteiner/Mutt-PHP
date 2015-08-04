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
      $this->getFrameworkAction();
    }

    function getUriParameters() {
      return $this->uriObject->parameters;
    }

    function getBaseRoute() {
      $host = $this->uriObject->host;
      $target = $this->uriObject->target;
      if(PROJECT_DIRECTORY !='') {
        $baseRoute = $host . '/' . trim(PROJECT_DIRECTORY, '/') . '/' . $target;
      }
      else {
        $baseRoute = $host . '/' . $target;
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

    function getFrameworkAction() {
      foreach($this->query as $key => $value){
      }
      if($this->query) {
        if (array_key_exists('deleteLocalLog', $this->query)) {
            FrameworkActions::deleteLocalLog();
        }
        elseif (array_key_exists('writeLocalLog', $this->query)) {
          FrameworkActions::writeLocalLog();
        }
        elseif (array_key_exists('deletePhpErrorLog', $this->query)) {
          FrameworkActions::deletePhpErrorLog();
        }
      }
    }


  }
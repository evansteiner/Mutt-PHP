<?php

  class GenericController {

    var $method;
    var $request;
    var $template;
    var $parameters;
    var $query;
    var $baseRoute;

    function __construct() {
      $this->method = $_SERVER['REQUEST_METHOD'];
      $this->request = $_SERVER['REQUEST_URI'];
      $this->template = '';
      $this->parameters = $this->getUriParameters();
      $this->query = $this->parseQuery();
      $this->baseRoute = $this->getBaseRoute();
      $this->getFrameworkAction();
    }

    function getUriParameters() {
      $uriObject = new ParseURI();
      return $uriObject->parameters;
    }

    function getBaseRoute() {
      $uriObject = new ParseURI();
      $host = $uriObject->host;
      $target = $uriObject->target;
      if(PROJECT_DIRECTORY !='') {
        $baseRoute = $host . '/' . trim(PROJECT_DIRECTORY, '/') . '/' . $target;
      }
      else {
        $baseRoute = $host . '/' . $target;
      }
      return $baseRoute;

    }

    function getQuery() {
      $uriObject = new ParseURI();
      return $uriObject->query;   
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
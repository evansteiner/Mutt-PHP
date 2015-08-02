<?php

  class GenericController {

    var $method;
    var $request;
    var $template;
    var $parameters;
    var $query;

    function __construct() {
      $this->method = $_SERVER['REQUEST_METHOD'];
      $this->request = $_SERVER['REQUEST_URI'];
      $this->template = '';
      $this->parameters = $this->getUriParameters();
      $this->query = $this->getQuery();
      $this->getFrameworkAction();
    }

    function getUriParameters() {
      $uriObject = new ParseURI();
      return $uriObject->parameters;
    }

    function getQuery() {
      $uriObject = new ParseURI();
      return $uriObject->query;   
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

    function getFrameworkAction() {
      if($this->parameters) {
        if (array_key_exists('deleteLocalLog', $this->parameters)) {
            FrameworkActions::deleteLocalLog();
        }
      }
    }

  }
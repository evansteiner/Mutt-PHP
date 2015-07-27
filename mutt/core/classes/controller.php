<?php

  class controller {

    var $method;
    var $request;
    var $target;
    var $isExtended;

    function __construct() {
      $this->method = $_SERVER['REQUEST_METHOD'];
      $this->request = $_SERVER['REQUEST_URI'];
      $this->target = $this->translateURI();
      $this->isExtended = $this->hasCustomController();
    }

    function translateURI() {
      $request = $this->request;
      if($request != '/' . PROJECT_DIRECTORY) {
        $url = explode(PROJECT_DIRECTORY, $request);
        $target = array_pop($url);
        return PROJECT_DIRECTORY . 'views/'.$target;
      }  
    }

    function hasCustomController() {
      // $target = $this->target;

      // if(file_exists('mutt/controllers/local/' . $target . '.php')){
      //   return 'has custom controller';
      // }
      // else {
      //   return 'no custom controller';
      // }
      return "evansteiner";
    }
  }
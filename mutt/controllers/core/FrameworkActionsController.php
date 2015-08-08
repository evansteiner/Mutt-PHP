<?php

  class FrameworkActionsController extends GenericController {
    
    function __construct() {
      parent::__construct();
      $this->actions();
    }   

    function actions() {
      if (array_key_exists('writeLocalLog', $this->parameters)) {
        Log::writeLocalLog();
      } 
    }
   
  }
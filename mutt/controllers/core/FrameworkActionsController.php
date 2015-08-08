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

      if (array_key_exists('deletePhpErrorLog', $this->parameters)) {
        Log::deletePhpErrorLog();
      }  

      if (array_key_exists('deleteLocalLog', $this->parameters)) {
        Log::deleteLocalLog();
      } 

      if (array_key_exists('addCookie', $this->parameters)) {
        Cookie::setCookie();
      } 

      if (array_key_exists('deleteAllCookies', $this->parameters)) {
        Cookie::deleteAllCookies();
      } 
    }
   
  }
<?php

  class Log {

    public static function write($msg) {
      if(file_exists(LOG_DIRECTORY.LOG_FILE)){
        $current = file_get_contents(LOG_DIRECTORY.LOG_FILE);
      }

      $time = new Moment();
      $timeStamp = $time->nowTimestamp();
      $msg = $timeStamp.': '.$msg;

      $file = fopen(LOG_DIRECTORY.LOG_FILE,"w");
      if(isset($current)){
        fwrite($file,$current);
      }
      fwrite($file,$msg."\r\n");
      fclose($file);
    }

    public static function getPhpErrorLog(){
      if(file_exists('error_log')){
        $current = file_get_contents('error_log');
        return $current;
      }
    }

    public static function deletePhpErrorLog() {
      if(file_exists('error_log')){
        unlink('error_log');
      }
      return;
    }

    public static function deleteLocalLog() {
      if(file_exists(LOG_DIRECTORY.LOG_FILE)){
        unlink(LOG_DIRECTORY.LOG_FILE);
      }
      return;
    }

    public static function writeLocalLog() {
      $msg = $_POST['log'];
      Log::write($msg);
      return;
    }

  }
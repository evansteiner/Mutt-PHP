<?php

  class log {
    public static function write($msg) {
      $file = fopen(LOG_DIRECTORY.LOG_FILE,"w");
      echo fwrite($file,$msg);
      fclose($file);
      return '';
    }
  }
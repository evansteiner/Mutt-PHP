<?php

  class log {
    public static function write($msg) {
      if(file_exists(LOG_DIRECTORY.LOG_FILE)){
        $current = file_get_contents(LOG_DIRECTORY.LOG_FILE);
      }

      $file = fopen(LOG_DIRECTORY.LOG_FILE,"w");
      if(isset($current)){
        fwrite($file,$current);
      }
      fwrite($file,$msg."\r\n");
      fclose($file);
    }
  }
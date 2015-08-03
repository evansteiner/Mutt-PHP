<?php
  class FrameworkActions {

    public static function deleteLocalLog() {
      Log::deleteLocalLog();
      return;
    }

    public static function writeLocalLog() {
      Log::writeLocalLog();
      return;
    }

    public static function deletePhpErrorLog() {
      Log::deletePhpErrorLog();
      return;
    }
  }
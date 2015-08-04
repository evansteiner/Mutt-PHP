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

    public static function addCookie() {
      Cookie::setCookie();
      return;
    }

    public static function deleteAllCookies() {
      Cookie::deleteAllCookies();
      return;
    }
  }
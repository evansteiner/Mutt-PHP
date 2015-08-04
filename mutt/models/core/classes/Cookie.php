<?php
  
  class Cookie {

    public static function deleteAllCookies() {
      if (isset($_SERVER['HTTP_COOKIE'])) {
          $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
          foreach($cookies as $cookie) {
              $parts = explode('=', $cookie);
              $name = trim($parts[0]);
              setcookie($name, '', time()-1000);
              setcookie($name, '', time()-1000, '/');
          }
      }
      return;      
    }

    public static function setCookie() {
      $name = $_POST['cookieName'];
      $value = $_POST['cookieValue'];
      $duration = $_POST['cookieDuration'];
      $domain = $_POST['cookieDomain'];
      setcookie($name, $value, time() + $duration, $domain);
      return;
    }
  }
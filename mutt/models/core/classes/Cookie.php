<?php
  
  class Cookie {

    public static function deleteAllCookies($returnURL) {
      if (isset($_SERVER['HTTP_COOKIE'])) {
          $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
          foreach($cookies as $cookie) {
              $parts = explode('=', $cookie);
              $name = trim($parts[0]);
              setcookie($name, '', time()-1000);
              setcookie($name, '', time()-1000, '/');
          }
      }
      if(strpos($returnURL, '?deleteAllCookies')) {
        $returnURL = substr($returnURL, 0, strpos($returnURL, "?deleteAllCookies"));
      }
      header("Location: $returnURL");
      return;      
    }

    public static function setCookie($returnURL) {
      $name = $_POST['cookieName'];
      $value = $_POST['cookieValue'];
      $duration = $_POST['cookieDuration'];
      $domain = $_POST['cookieDomain'];

      setcookie($name, $value, time() + $duration, $domain);
      
      if(strpos($returnURL, '?addCookie')) {
        $returnURL = substr($returnURL, 0, strpos($returnURL, "?addCookie"));
      }
      header("Location: $returnURL");
      return;
    }
  }
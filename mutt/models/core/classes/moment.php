<?php

  class moment {

    var $epoch;

    function __construct() {
      $this->epoch = time();
    }

    function getEpoch() {
      return $this->epoch;
    }

    function nowMMDDYYYY() {
      $epoch = $this->getEpoch();
      return date("m-d-Y", $epoch);
    }

    function nowYYYYMMDD() {
      $epoch = $this->getEpoch();
      return date("Y-m-d", $epoch);
    }

    function nowTimestamp() {
      $epoch = $this->getEpoch();
      return date("Y-m-d H:i:s", $epoch);
    }

  }
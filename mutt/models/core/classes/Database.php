<?php
  
  class Database {

    function dbConnect() {
      $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
      return $conn;
    }

    function validateConnection() {
        $conn = $this->dbConnect();
        if($conn){
          return "Valid database connection found!";
        }
        else {
          return "No valid database connection found.";
        }
      }
    }

    function query($query){
      $conn = $this->dbConnect();
      $conn->query($query);
      mysqli_close($conn); 
    }
  }

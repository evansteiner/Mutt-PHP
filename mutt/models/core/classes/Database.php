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

    function query($query){
      $conn = $this->dbConnect();
      $conn->query($query);
      mysqli_close($conn); 
    }

    function fetchRow($query){
      $conn = $this->dbConnect();
      $data = $conn->query($query);
      $result = $data->fetch_assoc();
      mysqli_close($conn); 
      return $result;
    }

    function fetchAll($query){
      $rows = array();
      $conn = $this->dbConnect();
      $result = $conn->query($query);
      while($row = $result->fetch_assoc()){
        $rows[] = $row;
      }
      mysqli_close($conn); 
      return $rows;
    }
  }

<?php
  function connectToDatabase() {
    $defaut_host = "localhost";
    $default_username = "root";
    $default_password = "";
    $default_dbname = "recipefindermcd";
    try {
      $db = new PDO("mysql:host=$defaut_host;dbname=$default_dbname", $default_username, $default_password,[
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      ]);
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    return $db;
  }
?>

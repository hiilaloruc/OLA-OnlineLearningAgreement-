<?php 
  session_start();
  $host_name = 'localhost';
  $database = 'ola';
  $user_name = 'root';
  $password = '';
  $pdo = null;

  try {
    $pdo = new PDO("mysql:host=$host_name; dbname=$database;charset=utf8", $user_name, $password);
  } catch (PDOException $e) {
    echo "Erreur!: " . $e->getMessage() . "<br/>";
    die();
  }

?>
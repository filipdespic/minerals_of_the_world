<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

class Database {
  private $host = "localhost"; // Host
  private $db_name = "minerals"; // DB Name
  private $username = "root"; // DB Username
  private $password = ""; // DB Password

  private static $instance = null; // Instanca klase
  public $connection = null; // Konekcija

  private function __construct() {
    $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
  }

  public function getConnection() {
    return $this->connection;
  }

  public static function getInstance() {
    if (!isset(self::$instance)) {
      self::$instance = new Database();
    }

    return self::$instance;
  }

  public function insertMineral($props) {
    $props = (object) $props;
    // print_r($props);
    $query = "INSERT INTO mineral (username, title, locality, price, img) VALUES ('$props->username', '$props->title', '$props->locality', $props->price, '$props->img')";
    $result = mysqli_query($this->getConnection(), $query) or die(mysqli_error($this->getConnection()));

    // print_r($query);

    if ($result) {
      return true;
    }

    return false;
  }

  public function getAllMinerals() {
    $query = "SELECT * FROM mineral";
    $result = mysqli_query($this->getConnection(), $query);
    $minerals = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $minerals;
  }

  public function getMineral($id) {
    $query = "SELECT * FROM mineral WHERE id = $id";
    $result = mysqli_query($this->getConnection(), $query);
    $mineral = $result->fetch_assoc();

    return $mineral;
  }

  public function updateMineral($props, $id) {
    $props = (object) $props;
    $query = "UPDATE mineral SET title = '$props->title', locality = '$props->locality', price = $props->price, img = '$props->img' WHERE id = $id LIMIT 1";
    $result = mysqli_query($this->getConnection(), $query) or die(mysqli_error($this->getConnection()));

    return $result;
  }

  public function deleteMineral($id) {
    $query = "DELETE FROM mineral WHERE id = $id LIMIT 1";
    $result = mysqli_query($this->getConnection(), $query);

    return $result;
  }
}

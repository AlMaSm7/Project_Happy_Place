<?php

class Marker
{
  public $id;
  public $lat;
  public $lng;

  public function __construct($lat, $lng, $id = null)
  {
    $this->lat = $lat;
    $this->lng = $lng;
    $this->id = $id;
  }

  public function toJson()
  {
    return json_encode([
      "id" => $this->id,
      "lat" => $this->lat,
      "lng" => $this->lng
    ]);
  }

  public function create($connection)
  {
    $lat = $connection->real_escape_string($this->lat);
    $lng = $connection->real_escape_string($this->lng);
    $sql = "INSERT INTO `markers` (lat, lng) VALUES ('$lat', '$lng');";

    $result = $connection->query($sql);

    if (!$result) {
      die($connection->error);
    }
  }

  public static function fetchAll($connection)
  {
    $sql = "SELECT * FROM `markers`";
    $result = $connection->query($sql);

    if (!$result) {
      die($connection->error);
    }

    $markersFromDatabase = $result->fetch_all(MYSQLI_ASSOC);
    $markers = [];

    foreach ($markersFromDatabase as $marker) {
      $markers[] = new Marker($marker['lat'], $marker['lng'], $marker['id']);
    }

    return $markers;
  }
}

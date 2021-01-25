<?php
require_once 'marker.class.php';
require_once 'database_class.php';

$markers = Marker::fetchAll($connection);

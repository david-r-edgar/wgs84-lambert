<?php
require 'flight/Flight.php';
require "gpoint.php";

Flight::route('/wgs84_lambert/@lat:[-0-9.]+/@lng:[-0-9.]+', function($lat, $lng){
    $gpoint = new gPoint('WGS 84');
    $gpoint->configLambertProjection (649328.0, 665262.0, 4.3592158333333333333333333333333, 50.797815, 49.833333333333333333333333333333, 51.166666666666666666666666666667);
    $gpoint->setLongLat($lng, $lat);
    $gpoint->convertLLtoLCC();
    Flight::json(array('easting' => $gpoint->lccE(), 'northing' => $gpoint->lccN()));
});

Flight::start();
?>

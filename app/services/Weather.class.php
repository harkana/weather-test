<?php
    namespace App\Services;

    interface Weather{
        public function DoWeatherByLatLon($lat, $lon);
        public function DoWeatherByZipCode($zipCode);
        public function DoWeatherByCityName($city);
        public function LoadIcon($icon);
    };
?>
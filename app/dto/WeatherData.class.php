<?php
    namespace App\Dto;

    class WeatherData{
        private $temp;
        private $windSpeed;
        private $pressure;
        private $iconId;
        private $city;
        private $lat;
        private $lon;
        private $zipCode;

        public function getTemp(){
            return ($this->temp);
        }

        public function setTemp($temp){
            $this->temp = $temp;
        }

        public function getWindSpeed(){
            return ($this->windSpeed);
        }

        public function setWindSpeed($windSpeed){
            $this->windSpeed = $windSpeed;
        }

        public function getPressure(){
            return ($this->pressure);
        }

        public function setPressure($pressure){
            $this->pressure = $pressure;
        }

        public function getIconId(){
            return ($this->iconId);
        }

        public function setIconId($iconId){
            $this->iconId = $iconId;
        }

        public function getCity(){
            return $this->city;
        }

        public function setCity($city){
            $this->city = $city;
        }

        public function getLat(){
            return ($this->lat);
        }

        public function setLat($lat){
            $this->lat = $lat;
        }

        public function getLon(){
            return ($this->lon);
        }

        public function setLon($lon){
            $this->lon = $lon;
        }

        public function getZipCode(){
            return ($this->zipCode);
        }

        public function setZipCode($zipCode){
            $this->zipCode = $zipCode;
        }
        public function toArray(){
            $tab = [];

            foreach ($this as $key => $value){
                $tab[$key] = $value;
            }
            return ($tab);
        }
    };
?>
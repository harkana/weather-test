<?php
    namespace App\Services;
    
    class WeatherImpl implements Weather{
        public static $URL = "api.openweathermap.org/data/2.5/weather";
        public static $APPID = "a08480b17172ec23f7a481605a294ec8";

        private $curlManager;

        public function __construct(){
            $this->curlManager = new CurlManager();
        }

        public function DoWeatherByLatLon($lat, $lon){
            $body = [];
            $url = self::$URL . "?lat=" . $lat . "&lon=" . $lon . "&APPID=" . self::$APPID;
            $data = new \App\Dto\WeatherData();
            
            $body = $this->curlManager->get($url);
            if ($body){
                $body = json_decode($body, true);
            }
            $data->setTemp($body["main"]["temp"] - 273.15);
            $data->setPressure($body["main"]["pressure"]);
            $icons = [];
            if ($body["weather"]){
                for ($i = 0; $i < count($body["weather"]); $i++){
                    $icons[] = $body["weather"][$i]["icon"];
                }
            }
            $data->setIconId($icons);
            $data->setWindSpeed($body["wind"]["speed"]);
            $data->setLat($body["coord"]["lat"]);
            $data->setLon($body["coord"]["lon"]);
            $data->setCity($body["name"]);
            return ($data);
        }

        public function DoWeatherByZipCode($zipCode)
        {
            $body = [];
            $url = self::$URL . "?zip=" . $zipCode . ",fr" . "&APPID=" . self::$APPID;
            $data = new \App\Dto\WeatherData();
            
            $body = $this->curlManager->get($url);
            if ($body){
                $body = json_decode($body, true);
            }
            $data->setTemp($body["main"]["temp"] - 273.15);
            $data->setPressure($body["main"]["pressure"]);
            $icons = [];
            if ($body["weather"]){
                for ($i = 0; $i < count($body["weather"]); $i++){
                    $icons[] = $body["weather"][$i]["icon"];
                }
            }
            $data->setIconId($icons);
            $data->setWindSpeed($body["wind"]["speed"]);
            $data->setLat($body["coord"]["lat"]);
            $data->setLon($body["coord"]["lon"]);
            $data->setCity($body["name"]);
            return ($data);
        }

        public function DoWeatherByCityName($city){
            $body = [];
            $url = self::$URL . "?q=" . $city . ",fr" . "&APPID=" . self::$APPID;
            $data = new \App\Dto\WeatherData();
            
            $body = $this->curlManager->get($url);
            if ($body){
                $body = json_decode($body, true);
            }
            $data->setTemp($body["main"]["temp"] - 273.15);
            $data->setPressure($body["main"]["pressure"]);
            $icons = [];
            if ($body["weather"]){
                for ($i = 0; $i < count($body["weather"]); $i++){
                    $icons[] = $body["weather"][$i]["icon"];
                }
            }
            $data->setIconId($icons);
            $data->setWindSpeed($body["wind"]["speed"]);
            $data->setLat($body["coord"]["lat"]);
            $data->setLon($body["coord"]["lon"]);
            $data->setCity($body["name"]);
            return ($data);            
        }

        public function LoadIcon($icon){
            $url = "http://openweathermap.org/img/w/" . $icon . ".png";

            $body = base64_encode($this->curlManager->get($url));
            return ($body); 
        }
    };
?>
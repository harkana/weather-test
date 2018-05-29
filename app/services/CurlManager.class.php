<?php
    namespace App\Services;

    class CurlManager{
        private $_contentType = null;
        private $_params = null;
        public function __construct(){}
        public function setParams($params){
            $this->_params = params;
        }
        public function setContentType($contentType){
            $this->_contentType = $contentType;
        }
        public function method($method, $url){
            $ch = curl_init();
            $data = null;
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
            if ($this->_params != null){
                curl_setopt($ch, CURLOPT_POSTFIELDS, $this->_params);
            }
            if ($this->_contentType != null){
                curl_setopt($ch, CURLOPT_HTTPHEADER, $this->_contentType);
            }
            $data = curl_exec($ch);
            curl_close($ch);
            return ($data);
        }
        public function get($url){
            return $this->method("GET", $url);
        }
        public function post($url){
            return $this->method("POST", $url);
        }
        public function delete($url){
            return $this->method("DELETE", $url);
        }
        public function  put($url){
            return $this->method("PUT", $url);
        }
    };
?>
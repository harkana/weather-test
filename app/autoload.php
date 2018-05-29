<?php
    function autoload_app($name){
        $tab = explode("\\", $name);
        $className = getcwd() . "/";

        if ($tab[0] == "App"){
            for ($i = 0; $i < count($tab) - 1; $i++){
                $className .= strtolower($tab[$i]);
                $className .= "/";
            }
            $className .= $tab[$i] . ".class.php";
            require_once $className;
        }
    }

    spl_autoload_register('autoload_app');
?>
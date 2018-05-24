<?php
class params{
    public static $params=array();
    public static function init_default_params(){
        self::$params=array(
            "db_type" => array ("value" => "mysql"), 
            "db_server" => array ("value" => "localhost"), 
            "db_name" => array ("value" => "u0397755_shiny"), 
            "db_user" => array ("value" => "u0397755_shiny"), 
            "db_password" => array ("value" => 'Bylecnhbz2018'), 
            );
    }
}
params::init_default_params();
<?php

class database{
    private static $connection;
    private static $options = [
        PDO::ATTR_EMULATE_PREPARES   => false,
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    public static function getConnection(){
        if(!isset(self::$connection)){
            $config = parse_ini_file('config.ini',true,INI_SCANNER_RAW);
            $config = $config['database'];

            try {
                self::$connection = new PDO('mysql:host='.$config['address'].';dbname='.$config['dbname'].';charset=utf8mb4', $config['username'], $config['password'], self::$options);
                return self::$connection;
            } catch (Exception $e) {
                die("Errore nella connessione");
            }
        }else{
            return self::$connection;
        }
    }
}
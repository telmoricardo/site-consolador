<?php

/*
 * SITE CONFIG
 */
define("SITE",[
   "name" => "O Consolador",
    "desc" => "Site com conteudo espirita",
    "domain" => "local.com",
    "locale" => "pt_BR",
    "root" => "http://localhost/site-consolador"
]);

/*
 * SITE MINIFY
 */
if($_SERVER["SERVER_NAME"] == "localhost"){
    require __DIR__ . "/Minify.php";
}

/*
 * DATABASE CONNECT
 */
define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "app_consolador",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);

/*
 * MAIL CONNECT
 */
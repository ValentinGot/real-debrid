<?php
require __DIR__ . '/../vendor/autoload.php';
require 'RealDebridSingleton.php';

$dotenv = new \Dotenv\Dotenv(dirname(__DIR__));
$dotenv->load();

function getToken() {
    return getenv('TOKEN');
}

function getRealDebrid() {
    return RealDebridSingleton::getInstance();
}
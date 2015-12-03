<?php
require __DIR__ . '/../vendor/autoload.php';
require 'RealDebridSingleton.php';

try {
    $dotenv = new \Dotenv\Dotenv(dirname(__DIR__));
    $dotenv->load();
} catch (InvalidArgumentException $e) {
    // Do nothing
}

function getToken() {
    return getenv('TOKEN');
}

function getRealDebrid() {
    return RealDebridSingleton::getInstance();
}

function mock_client($statusCode, $expectedResponse = '[]') {
    $client = Mockery::mock(\GuzzleHttp\ClientInterface::class);
    $response = Mockery::mock(\Psr\Http\Message\ResponseInterface::class);

    $client->shouldReceive('request')->once()->andReturn($response);
    $response->shouldReceive('getStatusCode')->once()->andReturn($statusCode);
    $response->shouldReceive('getBody')->once()->andReturn($expectedResponse);

    return $client;
}
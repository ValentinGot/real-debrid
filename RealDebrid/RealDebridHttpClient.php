<?php

namespace RealDebrid;

use GuzzleHttp\Client;

/**
 * Class RealDebridHttpClient
 *
 * @package RealDebrid
 * @author Valentin GOT
 */
class RealDebridHttpClient {
    const API_SCHEME = 'https';
    const API_URL = 'api.real-debrid.com/rest/1.0/';

    public static function make() {
        return new Client(array(
            'base_uri' => self::API_SCHEME . '://' . self::API_URL
        ));
    }
}
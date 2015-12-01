<?php

namespace RealDebrid;

use GuzzleHttp\ClientInterface;
use RealDebrid\Api\Downloads;
use RealDebrid\Api\Forum;
use RealDebrid\Api\Hosts;
use RealDebrid\Api\Settings;
use RealDebrid\Api\Torrents;
use RealDebrid\Api\Traffic;
use RealDebrid\Api\Unrestrict;
use RealDebrid\Api\User;
use RealDebrid\Auth\Token;

/**
 * Class RealDebrid
 *
 * @package RealDebrid
 * @author Valentin GOT
 */
class RealDebrid {

    /**
     * @var User
     */
    public $user;

    /**
     * @var Unrestrict
     */
    public $unrestrict;

    /**
     * @var Traffic
     */
    public $traffic;

    /**
     * @var Downloads
     */
    public $downloads;

    /**
     * @var Torrents
     */
    public $torrents;

    /**
     * @var Hosts
     */
    public $hosts;

    /**
     * @var Forum
     */
    public $forum;

    /**
     * @var Settings
     */
    public $settings;

    /**
     * @var Token
     */
    private $token;

    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * RealDebrid constructor.
     *
     * @param Token $token Accss token
     * @param ClientInterface|null $client Client interface
     */
    public function __construct(Token $token, ClientInterface $client = null) {
        $this->client = $client;
        if (is_null($client))
            $this->client = RealDebridHttpClient::make();
        $this->token = $token;

        $this->createWrappers();
    }

    /**
     * Creates the wrappers for all public properties and sets them
     */
    private function createWrappers() {
        $this->user = new User($this->token, $this->client);
        $this->unrestrict = new Unrestrict($this->token, $this->client);
        $this->traffic = new Traffic($this->token, $this->client);
        $this->downloads = new Downloads($this->token, $this->client);
        $this->torrents = new Torrents($this->token, $this->client);
        $this->hosts = new Hosts($this->token, $this->client);
        $this->forum = new Forum($this->token, $this->client);
        $this->settings = new Settings($this->token, $this->client);
    }
}
# [Real-Debrid API](https://github.com/ValentinGot/real-debrid)

> A simple API interface for real-debrid.com.

It allows you to communicate with Real-Debrid API and do things like unrestrict your download links or download some torrent files.

## Getting started

### Install

You may install the Real-Debrid API with Composer (recommended) or manually.

**Via [Composer](https://getcomposer.org) (preferred method)**

```
$ composer require vgot/real-debrid
```

**Manually**

If you don't want/have composer installed on your computer, you can manually download the library by cloning it with git.

```
$ git clone https://github.com/ValentinGot/real-debrid.git
```

### System Requirements

You need **PHP >= 5.3.0**

### Authentication

To retrieve your token, you must authenticate to [Real-Debrid](https://real-debrid.com/) and then go to the following URL :

https://real-debrid.com/apitoken

You must have a Real-Debrid premium account to access most of the API features.

## Basic usage

This section provides a quick introduction to Real-Debrid API interface and some examples.

### Creating a client

```php
use \RealDebrid\RealDebrid;
use \RealDebrid\Auth\Token;

$token = new Token('MY_TOKEN');
$realDebrid = new RealDebrid($token);
```

### Use API

Here is some examples on how to use the Real-Debrid API.

```php
// Retrieve user information
$userInformation = $realDebrid->user->get();

// Unrestrict a link
$link = $realDebrid->unrestrict->link('https://www.youtube.com/watch?v=nlcIKh6sBtc');

// Add a magnet link and start the torrent
$torrent = $realDebrid->torrents->addMagnet('magnet:?xt=urn:btih:637CE466AEC75A977D8BD02923ACF2788B2FA782&dn=game+of+thrones+s05e01+720p+hdtv+x264+immerse&tr=udp%3A%2F%2Fcoppersurfer.tk%3A6969%2Fannounce&tr=udp%3A%2F%2Fglotorrents.pw%3A6969%2Fannounce');
$realDebrid->torrents->selectFiles($torrent->id);

// Retrieve torrents list
$torrentQueue = $realDebrid->torrents->get();
```

## Available requests

Methods are grouped by namespaces (e.g. "unrestrict", "user").

### Downloads

### Forum

### Hosts

### Settings

### Torrents

### Traffic

### Unrestrict

### User

## Response handlers

## License

The Real-Debrid API is released under the Apache public license.

https://github.com/ValentinGot/real-debrid/blob/master/LICENSE

# [Real-Debrid API](https://github.com/ValentinGot/real-debrid)

[![Latest Stable Version](https://poser.pugx.org/vgot/real-debrid/v/stable)](https://packagist.org/packages/vgot/real-debrid)
[![Build Status](https://travis-ci.org/ValentinGot/real-debrid.svg)](https://travis-ci.org/ValentinGot/real-debrid)

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

You need **PHP >= 5.6.0**.

### Authentication

To retrieve your token, you must authenticate to [Real-Debrid](https://real-debrid.com/) and then go to the following URL:

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

### Using the API

Here is some examples on how to use the Real-Debrid API.
If you want more examples, you can go to the [/examples](https://github.com/ValentinGot/real-debrid/tree/master/examples) folder.

```php
// Retrieve user information
$userInformation = $realDebrid->user->get();

// Unrestrict a link
$link = $realDebrid->unrestrict->link('http://MY_LINK');

// Add a magnet link and start the torrent
$torrent = $realDebrid->torrents->addMagnet('magnet:MY_MAGNET_LINK');
$realDebrid->torrents->selectFiles($torrent->id);

// Retrieve torrents list
$torrentQueue = $realDebrid->torrents->get();
```

## Available requests

See the [Available requests](https://valentingot.github.io/real-debrid/available_requests) section of the documentation.

## Documentation

The current version can be seen at [valentingot.github.io/real-debrid](https://valentingot.github.io/real-debrid).

## License

The Real-Debrid API is released under the MIT license.

https://github.com/ValentinGot/real-debrid/blob/master/LICENSE

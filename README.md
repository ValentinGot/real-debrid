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

You need **PHP >= 5.3.0**.

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

Methods are grouped by namespaces (e.g. "unrestrict", "user").

### Downloads

All **Downloads** methods are available under ```\RealDebrid\RealDebrid()->downloads``` namespace.

```php
\RealDebrid\RealDebrid()->downloads->get($page = 1, $limit = 50, $offset = null): Get user downloads list
\RealDebrid\RealDebrid()->downloads->delete($id): Delete a link from downloads list
```

### Forum

All **Forum** methods are available under ```\RealDebrid\RealDebrid()->forum``` namespace.

```php
\RealDebrid\RealDebrid()->forum->forums(): Get the list of all forums with their category names
\RealDebrid\RealDebrid()->forum->topics($id, $meta = true, $page = 1, $limit = 50, $offset = null): Get the list of all topics inside the concerned forum
```

### Hosts

All **Hosts** methods are available under ```\RealDebrid\RealDebrid()->hosts``` namespace.

```php
\RealDebrid\RealDebrid()->hosts->get(): Get supported hosts
\RealDebrid\RealDebrid()->hosts->status(): Get status of supported hosters or not and their status on competitors
\RealDebrid\RealDebrid()->hosts->regex(): Get all supported links Regex, useful to find supported links inside a document
\RealDebrid\RealDebrid()->hosts->domains(): Get all hoster domains supported on the service
```

### Settings

All **Settings** methods are available under ```\RealDebrid\RealDebrid()->settings``` namespace.

```php
\RealDebrid\RealDebrid()->settings->get(): Get current user settings with possible values to update
\RealDebrid\RealDebrid()->settings->update($name, $value): Update a user setting. NOT WORKING YET
\RealDebrid\RealDebrid()->settings->convertPoints(): Convert fidelity points. NOT WORKING YET
\RealDebrid\RealDebrid()->settings->disableLogs(): Disable user logs ("This action is currently irreversible, take care"). NOT WORKING YET
\RealDebrid\RealDebrid()->settings->changePassword(): Send the verification email to change the password. NOT WORKING YET
\RealDebrid\RealDebrid()->settings->addAvatar($path): Upload a new user avatar image
\RealDebrid\RealDebrid()->settings->deleteAvatar(): Reset user avatar image to default
```

### Torrents

All **Torrents** methods are available under ```\RealDebrid\RealDebrid()->torrents``` namespace.

```php
\RealDebrid\RealDebrid()->torrents->get($filter = false, $page = 1, $limit = 50, $offset = null): Get user torrents list
\RealDebrid\RealDebrid()->torrents->torrent($id): Get all information on the asked torrent
\RealDebrid\RealDebrid()->torrents->availableHosts(): Get available hosts to upload the torrent to
\RealDebrid\RealDebrid()->torrents->addTorrent(): Add a torrent file to download. NOT WORKING YET
\RealDebrid\RealDebrid()->torrents->addMagnet($magnet, $host = null, $split = null): Add a magnet link to download
\RealDebrid\RealDebrid()->torrents->selectFiles($id, array $files = array()): Select files of a torrent to start it
\RealDebrid\RealDebrid()->torrents->delete($id): Delete a torrent from torrents list
```

### Traffic

All **Traffic** methods are available under ```\RealDebrid\RealDebrid()->traffic``` namespace.

### Unrestrict

All **Unrestrict** methods are available under ```\RealDebrid\RealDebrid()->unrestrict``` namespace.

### User

All **User** methods are available under ```\RealDebrid\RealDebrid()->user``` namespace.

## Response handlers

## License

The Real-Debrid API is released under the Apache public license.

https://github.com/ValentinGot/real-debrid/blob/master/LICENSE

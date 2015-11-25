# [Real-Debrid API](https://github.com/ValentinGot/real-debrid)

A simple API interface for real-debrid.com.

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

## Basic usage

```php
// Login
$user = new \RealDebrid\User();
$user->login('username', 'password');

// Unrestrict link
$download = new \RealDebrid\Download();
$download->unrestrict('http://yourhoster.com/ABCDEFGH');

// Upload torrent (only via magnet link)
$torrent = new \RealDebrid\Torrent();
$torrent->add('magnet:xxxxxx');

// Retrieve uploaded torrent link
$status = $torrent->status();
```

## API Reference

### User

```php
$user = new \RealDebrid\User();
```

#### Login

Login to real-debrid.com. A cookie is saved and used for the other requests to real-debrid.com.

```php
$user->login('username', 'password');
````

#### Valid hosters

Get all valid hosters supported by real-debrid.com.

```php
$user->valid_hosters();
```

#### Account

Get informations about the logged account.

```php
$user->account();
```

### Download

```php
$download = new \RealDebrid\Download();
```

#### Unrestrict 

Unrestrict a link and optionally tell the password to the file.

```php
$download->unrestrict('http://uptobox.com/ABCDEFGH');
$download->unrestrict('http://uptobox.com/ABCDEFGH', 'password');
```

### Torrent

```php
$torrent = new \RealDebrid\Torrent();
```

#### Add

Add a torrent file (using the magnet link) to the real-debrid.com service and convert it into a direct link available for download.

```php
$torrent->add('magnet:xxxxxx');
```

#### Status

Get user torrents status.

```php
$torrent->status();
```

## License

The Real-Debrid API is released under the Apache public license.

https://github.com/ValentinGot/real-debrid/blob/master/LICENSE

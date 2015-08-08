# Real-Debrid API

A simple API interface for real-debrid.com

## Getting started

### Install

You may install the Real-Debrid API with Composer (recommended) or manually.

### System Requirements

You need **PHP >= 5.3.0**

## API Reference

### User

```
$user = new \RealDebrid\User();
```

#### Login

Login to real-debrid.com. A cookie is saved and used for the other requests to real-debrid.com.

```
$user->login('username', 'password');
````

#### Valid hosters

Get all valid hosters supported by real-debrid.com.

```
$user->valid_hosters();
```

#### Account

Get informations about the logged account.

```
$user->account();
```

### Download

**COMING SOON**

### Torrent

```
$torrent = new \RealDebrid\Torrent();
```

#### Add

Add a torrent file (using the magnet link) to the real-debrid.com service and convert it into a direct link available for download.

```
$torrent->add('magnet:xxxxxx');
```

#### Status

Get user torrents status.

```
$torrent->status();
```

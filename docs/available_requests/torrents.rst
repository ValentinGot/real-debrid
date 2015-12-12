.. index::
    single: Available requests; Torrents

Torrents
========

All **Torrents** methods are available under :literal:`\\RealDebrid\\RealDebrid()->torrents` namespace.

.. note::

    In order to use any of these methods, remember to create a **RealDebrid client**.

    Please refer to the :ref:`Creating a client <creating-a-client>` section if you didn't do it.

get()
-----

Get user torrents list.

Parameters
^^^^^^^^^^

+-----------+-------------------------------------------------------------------+-----------+-----------+
| param.    | desc.                                                             | type      | default   |
+===========+===================================================================+===========+===========+
| filter    | TRUE to list only active torrents; FALSE otherwise                | bool      | false     |
+-----------+-------------------------------------------------------------------+-----------+-----------+
| page      | The page to retrieve                                              | integer   | 1         |
+-----------+-------------------------------------------------------------------+-----------+-----------+
| limit     | Entries returned per page / request (must be within 0 and 100)    | integer   | 50        |
+-----------+-------------------------------------------------------------------+-----------+-----------+
| offset    | Starting offset                                                   | integer   | null      |
+-----------+-------------------------------------------------------------------+-----------+-----------+

.. warning::

    You can not use both *offset* and *page* at the same time, *page* is prioritized in case it happens.

Return
^^^^^^

The user torrents list as an :literal:`Array`

.. code-block:: json

    [
        {
            "id": "LTE4WLDQGNOJ4",
            "filename": "MY_TORRENT",
            "hash": "054ecf74eabfb4e3c3ef970d872db8687d132671",
            "bytes": 813458970,
            "host": "hoster.com",
            "split": 50,
            "progress": 100,
            "status": "downloaded",
            "added": "2015-12-09T19:11:04.000Z",
            "links": [
                "http://hoster.com/kts3w2lntxh6"
            ],
            "ended": "2015-12-09T19:15:11.000Z"
        }
    ]

Examples
^^^^^^^^

.. code-block:: php

    <?php
    // Page 1, no Filter, Limit 50
    $torrents = $realDebrid->torrents->get();

    // Page 1, Filter, Limit 50
    $torrents = $realDebrid->torrents->get(true);

    // Page 2, no Filter, Limit 50
    $torrents = $realDebrid->torrents->get(false, 2);

    // Page 2, no Filter, Limit 10
    $torrents = $realDebrid->torrents->get(false, 2, 10);

    // no Filter, Limit 10, Offset 1
    $torrents = $realDebrid->torrents->get(false, null, 10, 1);

torrent()
---------

Get all information on the asked torrent.

Parameters
^^^^^^^^^^

+-----------+----------------------------------------------+-----------+-----------+
| param.    | desc.                                        | type      | default   |
+===========+==============================================+===========+===========+
| **id \*** | Torrent ID (retrieved by the get() method)   | string    |           |
+-----------+----------------------------------------------+-----------+-----------+

Return
^^^^^^

The torrent information as an :literal:`stdClass`

.. code-block:: json

    {
        "id": "LTE4WLDQGNOJ4",
        "filename": "MY_TORRENT",
        "original_filename": "MY_TORRENT",
        "hash": "054ecf74eabfb4e3c3ef970d872db8687d132671",
        "bytes": 813458970,
        "original_bytes": 813458970,
        "host": "hoster.com",
        "split": 50,
        "progress": 100,
        "status": "downloaded",
        "added": "2015-12-09T19:11:04.000Z",
        "files": [
            {
                "id": 1,
                "path": "/MY_TORRENT.mkv",
                "bytes": 813458408,
                "selected": 1
            }
        ],
        "links": [
            "http://hoster.com/kts3w2lntxh6"
        ],
        "ended": "2015-12-09T19:15:11.000Z"
    }

Examples
^^^^^^^^

.. code-block:: php

    <?php
    $torrent = $realDebrid->torrents->torrent('LTE4WLDQGNOJ4');

availableHosts()
----------------

Get available hosts to upload the torrent to.

Return
^^^^^^

The available hosts as an :literal:`Array`

.. code-block:: json

    [
        {
            "host": "1fichier.com",
            "max_file_size": 50
        },
        {
            "host": "uptobox.com",
            "max_file_size": 50
        }
    ]

Examples
^^^^^^^^

.. code-block:: php

    <?php
    $availableHosts = $realDebrid->torrents->availableHosts();

addTorrent()
------------

Add a torrent file to download.

.. caution::

    The files must be selected with the :literal:`\\RealDebrid\\RealDebrid()->torrents->selectFiles()` method to start the torrent.

Parameters
^^^^^^^^^^

+-------------+--------------------------------------------------------------+-----------+-----------+
| param.      | desc.                                                        | type      | default   |
+=============+==============================================================+===========+===========+
| **path \*** | Path to the torrent file                                     | string    |           |
+-------------+--------------------------------------------------------------+-----------+-----------+
| host        | Hoster domain (retrieved from the availableHosts() method)   | int       | null      |
+-------------+--------------------------------------------------------------+-----------+-----------+
| split       | Split size (retrieved from the availableHosts() method)      | int       | null      |
+-------------+--------------------------------------------------------------+-----------+-----------+

Return
^^^^^^

The torrent information as an :literal:`stdClass`

.. code-block:: json

    {
        "id": "LTE4WLDQGNOJ4",
        "uri": "http://hoster.com/kts3w2lntxh6"
    }

Examples
^^^^^^^^

.. code-block:: php

    <?php
    $torrent = $realDebrid->torrents->addTorrent('C:/fakepath/my-torrent.to');

    // First hoster
    $torrent = $realDebrid->torrents->addTorrent('C:/fakepath/my-torrent.to', 0);

    // First hoster, 50GB split size
    $torrent = $realDebrid->torrents->addTorrent('C:/fakepath/my-torrent.to', 0, 50);

addMagnet()
-----------

Add a magnet link to download.

.. caution::

    The files must be selected with the :literal:`\\RealDebrid\\RealDebrid()->torrents->selectFiles()` method to start the torrent.

Parameters
^^^^^^^^^^

+---------------+--------------------------------------------------------------+-----------+-----------+
| param.        | desc.                                                        | type      | default   |
+===============+==============================================================+===========+===========+
| **magnet \*** | Magnet link                                                  | string    |           |
+---------------+--------------------------------------------------------------+-----------+-----------+
| host          | Hoster domain (retrieved from the availableHosts() method)   | int       | null      |
+---------------+--------------------------------------------------------------+-----------+-----------+
| split         | Split size (retrieved from the availableHosts() method)      | int       | null      |
+---------------+--------------------------------------------------------------+-----------+-----------+

Return
^^^^^^

The torrent information as an :literal:`stdClass`

.. code-block:: json

    {
        "id": "LTE4WLDQGNOJ4",
        "uri": "http://hoster.com/kts3w2lntxh6"
    }

Examples
^^^^^^^^

.. code-block:: php

    <?php
    $torrent = $realDebrid->torrents->addMagnet('magnet:?fakemagnet');

    // First hoster
    $torrent = $realDebrid->torrents->addMagnet('magnet:?fakemagnet', 0);

    // First hoster, 50GB split size
    $torrent = $realDebrid->torrents->addMagnet('magnet:?fakemagnet', 0, 50);

selectFiles()
-------------

Select files of a torrent to start it.

.. note::

    The :literal:`\\RealDebrid\\RealDebrid()->torrents->addTorrent()` or :literal:`\\RealDebrid\\RealDebrid()->torrents->addMagnet()` methods must return you a torrent ID which will be used to select the files.

    To get file IDs, use :literal:`\\RealDebrid\\RealDebrid()->torrents->torrent()` method.

Parameters
^^^^^^^^^^

+-----------+--------------------------------------------------------------------+-----------+-----------+
| param.    | desc.                                                              | type      | default   |
+===========+====================================================================+===========+===========+
| **id \*** | Torrent ID (from addTorrent(), addMagnet() or torrent() methods)   | string    |           |
+-----------+--------------------------------------------------------------------+-----------+-----------+
| files     | Array of selected files IDs (default will select **all** files)    | array     | array()   |
+-----------+--------------------------------------------------------------------+-----------+-----------+

Examples
^^^^^^^^

.. code-block:: php

    <?php
    $realDebrid->torrents->selectFiles('LTE4WLDQGNOJ4');

    // Only select files 1 and 2
    $realDebrid->torrents->selectFiles('LTE4WLDQGNOJ4', [1, 2]);

delete()
--------

Delete a torrent from torrents list.

Parameters
^^^^^^^^^^

+-----------+---------------------------------------------------+-----------+-----------+
| param.    | desc.                                             | type      | default   |
+===========+===================================================+===========+===========+
| **id \*** | Torrent  ID (retrieved by the torrent() method)   | string    |           |
+-----------+---------------------------------------------------+-----------+-----------+

Examples
^^^^^^^^

.. code-block:: php

    <?php
    $realDebrid->torrents->delete('LTE4WLDQGNOJ4');
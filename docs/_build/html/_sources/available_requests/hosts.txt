.. index::
    single: Available requests; Hosts

Hosts
=====

All **Hosts** methods are available under :literal:`\\RealDebrid\\RealDebrid()->hosts` namespace.

.. note::

    In order to use any of these methods, remember to create a **RealDebrid client**.

    Please refer to the :ref:`Creating a client <creating-a-client>` section if you didn't do it.

get()
-----

Get supported hosts.

Return
^^^^^^

List of supported hosts as an :literal:`stdClass`

.. code-block:: json

    {
        "1fichier.com": {
            "id": "1f",
            "name": "1Fichier",
            "image": "https://cdn.realdebrid.xtnetwork.fr/0482/images/hosters/1fichier.png"
        },
        "2shared.com": {
            "id": "2s",
            "name": "2Shared",
            "image": "https://cdn.realdebrid.xtnetwork.fr/0482/images/hosters/2shared.png"
        }
    }

Examples
^^^^^^^^

.. code-block:: php

    <?php
    $supportedHosts = $realDebrid->hosts->get();

status()
--------

Get status of supported hosters or not and their status on competitors.

Return
^^^^^^

List of supported hosts status as an :literal:`stdClass`

.. code-block:: json

    {
        "1fichier.com": {
            "id": "1f",
            "name": "1Fichier",
            "image": "https://cdn.realdebrid.xtnetwork.fr/0482/images/hosters/1fichier.png",
            "supported": 1,
            "status": "up",
            "check_time": "2015-12-10T10:23:57.000Z",
            "competitors_status": {
                "mega-debrid.eu": {
                    "status": "up",
                    "check_time": "2015-12-10T10:23:57.000Z"
                },
                "linksnappy.com": {
                    "status": "up",
                    "check_time": "2015-12-10T10:24:01.000Z"
                },
                "premiumize.me": {
                    "status": "up",
                    "check_time": "2015-12-10T10:23:58.000Z"
                }
            }
        }
    }

Examples
^^^^^^^^

.. code-block:: php

    <?php
    $status = $realDebrid->hosts->status();

regex()
-------

Get all supported links Regex, useful to find supported links inside a document.

Return
^^^^^^

List of supported links regex as an :literal:`Array`

.. code-block:: json

    [
        "/(http|https):\/\/(\w+\.)?180upload\.com\/[0-9a-z]{12}/",
        "/(http|https):\/\/(\w+\.)?2shared\.com\/([^( |\"|'|>|<|\r\n\|\n|$)]+)/",
        "/(http|https):\/\/(\w+\.)?4shared\.com\/([^( |\"|'|>|<|\r\n\|\n|$)]+)/"
    ]

Examples
^^^^^^^^

.. code-block:: php

    <?php
    $regex = $realDebrid->hosts->regex();

domains()
---------

Get all hoster domains supported on the service.

Return
^^^^^^

List of supported hoster domains :literal:`Array`

.. code-block:: json

    [
        "1fichier.com",
        "alterupload.com",
        "cjoint.net",
        "desfichiers.com"
    ]

Examples
^^^^^^^^

.. code-block:: php

    <?php
    $domains = $realDebrid->hosts->domains();
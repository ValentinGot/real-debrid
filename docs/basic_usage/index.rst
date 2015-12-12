Basic usage
===========

.. _authenticate:

Authenticate
------------

First, please refer to the :ref:`Authentication token<authentication-token>` section to retrieve your Real-Debrid API token.

Then, to authenticate, you just have to create a Token

.. code-block:: php

    <?php
    use \RealDebrid\Auth\Token;

    $token = new Token('MY_TOKEN');

.. _creating-a-client:

Creating a client
-----------------

Now, you have to create the RealDebrid client, which will be used to launch every call requests.

.. code-block:: php

    <?php
    use \RealDebrid\RealDebrid;

    $realDebrid = new RealDebrid($token);

.. _using-the-api:

Using the API
-------------

Here is some examples on how to use the Real-Debrid API.
If you want more information about the available requests, please refer to the :doc:`Available requests <../available_requests/index>` section.

.. code-block:: php

    <?php
    // Retrieve user information
    $userInformation = $realDebrid->user->get();

    // Unrestrict a link
    $link = $realDebrid->unrestrict->link('http://MY_LINK');

    // Add a magnet link and start the torrent
    $torrent = $realDebrid->torrents->addMagnet('magnet:MY_MAGNET_LINK');
    $realDebrid->torrents->selectFiles($torrent->id);

    // Retrieve torrents list
    $torrentQueue = $realDebrid->torrents->get();
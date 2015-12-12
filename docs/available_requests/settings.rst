.. index::
    single: Available requests; Settings

Settings
========

All **Settings** methods are available under :literal:`\\RealDebrid\\RealDebrid()->settings` namespace.

.. note::

    In order to use any of these methods, remember to create a **RealDebrid client**.

    Please refer to the :ref:`Creating a client <creating-a-client>` section if you didn't do it.

get()
-----

Get current user settings with possible values to update.

Return
^^^^^^

The settings as an :literal:`stdClass`

.. code-block:: json

    {
        "download_ports": [
            "normal",
            "secured"
        ],
        "download_port": "normal"
    }

Examples
^^^^^^^^

.. code-block:: php

    <?php
    $settings = $realDebrid->settings->get();

update()
--------

.. error::

    Not working yet

convertPoints()
---------------

.. error::

    Not working yet

disableLogs()
-------------

.. error::

    Not working yet

addAvatar()
-----------

Upload a new user avatar image.

.. note::

    The response might throw a :literal:`\RealDebrid\\Exception\\RealDebridException` with one of the following messages :

    * **Image resolution error**: maximum resolution is 150px x 230px
    * **File not allowed**: allowed extensions are .jpg, .gif and .png
    * **Upload too big**: maximum file size is 1024 KB

Parameters
^^^^^^^^^^

+----------------+---------------------------+-----------+-----------+
| param.         | desc.                     | type      | default   |
+================+===========================+===========+===========+
| **$path \***   | Path to the avatar file   | string    |           |
+----------------+---------------------------+-----------+-----------+


Examples
^^^^^^^^

.. code-block:: php

    <?php
    $settings = $realDebrid->settings->addAvatar('C:/fakepath/avatar.png');

deleteAvatar()
--------------

Reset user avatar image to default.

Examples
^^^^^^^^

.. code-block:: php

    <?php
    $settings = $realDebrid->settings->deleteAvatar();
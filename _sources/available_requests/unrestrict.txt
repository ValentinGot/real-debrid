.. index::
    single: Available requests; Unrestrict

Unrestrict
==========

All **Unrestrict** methods are available under :literal:`\\RealDebrid\\RealDebrid()->unrestrict` namespace.

.. note::

    In order to use any of these methods, remember to create a **RealDebrid client**.

    Please refer to the :ref:`Creating a client <creating-a-client>` section if you didn't do it.

check()
-------

Check if a file is downloadable on the concerned hoster.

Parameters
^^^^^^^^^^

+---------------+--------------------------------------------------+-----------+-----------+
| param.        | desc.                                            | type      | default   |
+===============+==================================================+===========+===========+
| **link \***   | The original hoster link                         | string    |           |
+---------------+--------------------------------------------------+-----------+-----------+
| password      | Password to unlock the file access hoster side   | string    | null      |
+---------------+--------------------------------------------------+-----------+-----------+

Return
^^^^^^

The link information as an :literal:`stdClass`

.. code-block:: json

    {
        "host": "mega.co.nz",
        "link": "https://mega.nz/#!Zp1FFDSC!fo7PcxtdkyDO52x0VdNaeP_W5CiCV84iPtuOqV2y0Assdmlfksmlfk",
        "filename": "PDF.pdf",
        "filesize": 80675,
        "supported": 1
    }

Examples
^^^^^^^^

.. code-block:: php

    <?php
    $link = $realDebrid->unrestrict->check('https://mega.nz/#!Zp1FFDSC!fo7PcxtdkyDO52x0VdNaeP_W5CiCV84iPtuOqV2y0Assdmlfksmlfk');

link()
------

Unrestrict a hoster link and get a new unrestricted link.

Parameters
^^^^^^^^^^

+---------------+--------------------------------------------------------------------------------+-----------+-----------+
| param.        | desc.                                                                          | type      | default   |
+===============+================================================================================+===========+===========+
| **link \***   | The original hoster link                                                       | string    |           |
+---------------+--------------------------------------------------------------------------------+-----------+-----------+
| password      | Password to unlock the file access hoster side                                 | string    | null      |
+---------------+--------------------------------------------------------------------------------+-----------+-----------+
| remote        | Use Remote traffic, dedicated servers and account sharing protections lifted   | string    | null      |
+---------------+--------------------------------------------------------------------------------+-----------+-----------+

Return
^^^^^^

The unrestricted link(s) as an :literal:`stdClass`

.. code-block:: json

    {
        "id": "TFCZPL3KTFPUQ",
        "filename": "PDF.pdf",
        "filesize": 80675,
        "link": "https://mega.nz/#!Zp1FFDSC!fo7PcxtdkyDO52x0VdNaeP_W5CiCV84iPtuOqV2y0As",
        "host": "mega.co.nz",
        "chunks": 8,
        "crc": 1,
        "download": "http://fc.rdeb.io/d/TFCZPL3KTFPUQ/PDF.pdf",
        "streamable": 0
    }

Examples
^^^^^^^^

.. code-block:: php

    <?php
    $link = $realDebrid->unrestrict->link('https://mega.nz/#!Zp1FFDSC!fo7PcxtdkyDO52x0VdNaeP_W5CiCV84iPtuOqV2y0As');

folder()
--------

Unrestrict a hoster folder link and get individual links, returns an empty array if no links found.

.. note::

    You must unrestrict each link one by one after retrieving it with the folder() method.

Parameters
^^^^^^^^^^

+---------------+----------------------------+-----------+-----------+
| param.        | desc.                      | type      | default   |
+===============+============================+===========+===========+
| **link \***   | The original hoster link   | string    |           |
+---------------+----------------------------+-----------+-----------+

Return
^^^^^^

The folder links as an :literal:`Array`

.. code-block:: json

    [
        "https://mega.co.nz/#!FscTGRiT!fo7PcxtdkyDO52x0VdNaeP_W5CiCV84iPtuOqV2y0As",
        "https://mega.co.nz/#!pxcngb6A!fo7PcxtdkyDO52x0VdNaeP_W5CiCV84iPtuOqV2y0As"
    ]

Examples
^^^^^^^^

.. code-block:: php

    <?php
    $link = $realDebrid->unrestrict->folder('https://mega.nz/#F!Fi90nET7a!Dg0pH7gTTG_jmrRBemM77g');

containerFile()
---------------

Decrypt a container file (RSDF, CCF, CCF3, DLC).

.. note::

    You must unrestrict each link one by one after retrieving it with the containerFile() method.

Parameters
^^^^^^^^^^

+---------------+------------------------------+-----------+-----------+
| param.        | desc.                        | type      | default   |
+===============+==============================+===========+===========+
| **path \***   | Path to the container file   | string    |           |
+---------------+------------------------------+-----------+-----------+

Return
^^^^^^

The links as an :literal:`Array`

.. code-block:: json

    [
        "https://mega.co.nz/#!FscTGRiT!fo7PcxtdkyDO52x0VdNaeP_W5CiCV84iPtuOqV2y0As",
        "https://mega.co.nz/#!pxcngb6A!fo7PcxtdkyDO52x0VdNaeP_W5CiCV84iPtuOqV2y0As"
    ]

Examples
^^^^^^^^

.. code-block:: php

    <?php
    $link = $realDebrid->unrestrict->containerFile('C:/fakepath/container.rsdf');

containerLink()
---------------

Decrypt a container file from a link.

.. note::

    You must unrestrict each link one by one after retrieving it with the containerLink() method.

Parameters
^^^^^^^^^^

+----------------+-----------------------------------+-----------+-----------+
| param.         | desc.                             | type      | default   |
+================+===================================+===========+===========+
| **$link \***   | HTTP Link of the container file   | string    |           |
+----------------+-----------------------------------+-----------+-----------+

Return
^^^^^^

The links as an :literal:`Array`

.. code-block:: json

    [
        "https://mega.co.nz/#!FscTGRiT!fo7PcxtdkyDO52x0VdNaeP_W5CiCV84iPtuOqV2y0As",
        "https://mega.co.nz/#!pxcngb6A!fo7PcxtdkyDO52x0VdNaeP_W5CiCV84iPtuOqV2y0As"
    ]

Examples
^^^^^^^^

.. code-block:: php

    <?php
    $link = $realDebrid->unrestrict->containerLink('http://somelink.com');
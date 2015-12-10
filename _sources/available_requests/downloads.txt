.. index::
    single: Available requests; Downloads

Downloads
=========

All **Downloads** methods are available under :literal:`\\RealDebrid\\RealDebrid()->downloads` namespace.

.. note::

    In order to use any of these methods, remember to create a **RealDebrid client**.

    Please refer to the :ref:`Creating a client <creating-a-client>` section if you didn't do it.

get()
-----

Get user downloads list.

Parameters
^^^^^^^^^^

+-----------+-------------------------------------------------------------------+-----------+-----------+
| param.    | desc.                                                             | type      | default   |
+===========+===================================================================+===========+===========+
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

The downloads list as an :literal:`Array`

.. code-block:: json

    [
        {
            "id": "MKXSUYLZYTXKM",
            "filename": "my-file",
            "filesize": 661263016,
            "link": "http://hoster.com/ABCDEFG",
            "host": "host.com",
            "chunks": 16,
            "download": "http://fa.rdeb.io/d/MKXSUYLZYTXKM/my-file",
            "generated": "2015-12-04T19:11:02.000Z"
        }
    ]

Examples
^^^^^^^^

.. code-block:: php

    <?php
    // Page 1, Limit 50
    $downloads = $realDebrid->downloads->get();

    // Page 2, Limit 50
    $downloads = $realDebrid->downloads->get(2);

    // Page 2, Limit 10
    $downloads = $realDebrid->downloads->get(2, 10);

    // Limit 10, Offset 1
    $downloads = $realDebrid->downloads->get(null, 10, 1);

delete()
--------

Delete a link from downloads list

Parameters
^^^^^^^^^^

+-----------+-----------------------------------------------+-----------+-----------+
| param.    | desc.                                         | type      | default   |
+===========+===============================================+===========+===========+
| **id \*** | Download ID (retrieved by the get() method)   | string    |           |
+-----------+-----------------------------------------------+-----------+-----------+

Examples
^^^^^^^^

.. code-block:: php

    <?php
    $realDebrid->downloads->delete('MKXSUYLZYTXKM');


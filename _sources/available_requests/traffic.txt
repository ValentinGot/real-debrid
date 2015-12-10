.. index::
    single: Available requests; Traffic

Traffic
=======

All **Traffic** methods are available under :literal:`\\RealDebrid\\RealDebrid()->traffic` namespace.

.. note::

    In order to use any of these methods, remember to create a **RealDebrid client**.

    Please refer to the :ref:`Creating a client <creating-a-client>` section if you didn't do it.


get()
-----

Get traffic information for limited hosters (limits, current usage, extra packages).

Return
^^^^^^

The traffic information as an :literal:`stdClass`

.. code-block:: json

    {
        "depfile.com": {
            "left": 20,
            "bytes": 0,
            "links": 0,
            "limit": 20,
            "type": "links",
            "extra": 0,
            "reset": "daily"
        },
            "extmatrix.com": {
            "left": 21474836480,
            "bytes": 0,
            "links": 0,
            "limit": 20,
            "type": "gigabytes",
            "extra": 0,
            "reset": "daily"
        }
    }

Examples
^^^^^^^^

.. code-block:: php

    <?php
    $traffic = $realDebrid->traffic->get();

details()
---------

Get traffic details on each hoster used during a defined period

Parameters
^^^^^^^^^^

For **start** and **end** parameters we use the `Carbon <http://carbon.nesbot.com/>`_ library.

+-----------+----------------+-----------+--------------+
| param.    | desc.          | type      | default      |
+===========+================+===========+==============+
| start     | Start period   | Carbon    | a week ago   |
+-----------+----------------+-----------+--------------+
| end       | End period     | Carbon    | today        |
+-----------+----------------+-----------+--------------+

Return
^^^^^^

The traffic details as an :literal:`stdClass`

.. code-block:: json

    {
        "2015-12-09": {
            "host": {
                "uptobox.com": 11066701819
            },
            "bytes": 11066701819
        },
        "2015-12-08": {
            "host": {
                "uptobox.com": 872664221
            },
            "bytes": 872664221
        }
    }

Examples
^^^^^^^^

.. code-block:: php

    <?php
    use \Carbon\Carbon;

    // Start: a week ago, End: today
    $traffic = $realDebrid->traffic->details();

    // Start: 2015-11-24, End: today
    $traffic = $realDebrid->traffic->details(Carbon::createFromDate(2015, 11, 24));

    // Start: 2015-11-24, End: today
    $traffic = $realDebrid->traffic->details(Carbon::createFromDate(2015, 11, 24), Carbon::now());
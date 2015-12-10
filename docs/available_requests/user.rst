.. index::
    single: Available requests; User

User
====

All **User** methods are available under :literal:`\\RealDebrid\\RealDebrid()->user` namespace.

.. note::

    In order to use any of these methods, remember to create a **RealDebrid client**.

    Please refer to the :ref:`Creating a client <creating-a-client>` section if you didn't do it.


get()
-----

Returns some information on the current user.

Return
^^^^^^

The user information as a :literal:`\\RealDebrid\\Response\\User`

This method is using an example of :doc:`Response Handler <../response_handlers/index>`.

.. code-block:: json

    {
        "id": 214239,
        "username": "USERNAME",
        "email": "me@mail.fr",
        "points": 950,
        "locale": "fr",
        "avatar": "https://cdn.realdebrid.xtnetwork.fr/images/avatars/MON_AVATAR",
        "type": "premium",
        "premium": 3656961,
        "expiration": "2016-01-21T19:37:40.000Z"
    }

Examples
^^^^^^^^

.. code-block:: php

    <?php
    $user = $realDebrid->user->get();
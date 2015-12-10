.. index::
    single: Available requests; Forum

Forum
=====

All **Forum** methods are available under :literal:`\\RealDebrid\\RealDebrid()->forum` namespace.

.. note::

    In order to use any of these methods, remember to create a **RealDebrid client**.

    Please refer to the :ref:`Creating a client <creating-a-client>` section if you didn't do it.

forums()
--------

Get the list of all forums with their category names.

Return
^^^^^^

List of forums as an :literal:`stdClass`

.. code-block:: json

    {
        "Real-Debrid FR": [
            {
                "id": 4,
                "name": "Support Débridage",
                "description": "Pour aider et se faire aider.",
                "topics": 1323,
                "posts": 6485,
                "unread_content": 1,
                "last_post": {
                    "id": 77996,
                    "topic_id": 13460,
                    "user_id": 7074,
                    "user_name": "link348",
                    "user_level": "moderator",
                    "date": "2015-12-09T21:57:11.000Z"
                }
            }
        ]
    }

Examples
^^^^^^^^

.. code-block:: php

    <?php
    $forums = $realDebrid->forum->forums();

topics()
--------

Get the list of all topics inside the concerned forum.

Parameters
^^^^^^^^^^

+-----------+-------------------------------------------------------------------+-----------+-----------+
| param.    | desc.                                                             | type      | default   |
+===========+===================================================================+===========+===========+
| **id \*** | Forum ID (retrieved by the forums() method)                       | integer   |           |
+-----------+-------------------------------------------------------------------+-----------+-----------+
| meta      | TRUE to show meta information; FALSE otherwise                    | integer   | true      |
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

List of topics as an :literal:`stdClass`

In this example, **meta** is set to :literal:`true`

.. code-block:: json

    {
        "meta": {
            "id": 4,
            "name": "Support Débridage",
            "description": "Pour aider et se faire aider.",
            "topics": 1323,
            "autorisation_topic": 1,
            "autorisation_post": 1,
            "autorisation_stick": 0,
            "autorisation_moderation": 0
        },
        "topics": {
            "sticky": [
                {
                    "id": 13311,
                    "title": "Plugin Synology [OFFICIEL]",
                    "author": {
                        "user_id": 1,
                        "username": "TheCrach",
                        "level": "administrator"
                    },
                    "posts": 11,
                    "views": 263,
                    "unread_content": 1,
                    "last_post": {
                        "id": 77957,
                        "user_id": 440309,
                        "user_name": "erriep",
                        "user_level": "user",
                        "date": "2015-12-08T23:08:43.000Z"
                    }
                }
            ],
            "normal": []
        }
    }

Examples
^^^^^^^^

.. code-block:: php

    <?php
    // Topic ID: 4, Meta, Page 1, Limit 50
    $topics = $realDebrid->forum->topics(4);

    // Topic ID: 4, no Meta, Page 1, Limit 50
    $topics = $realDebrid->forum->topics(4, false);

    // Topic ID: 4, Meta, Page 2, Limit 50
    $topics = $realDebrid->forum->topics(4, true, 2);

    // Topic ID: 4, Meta, Page 2, Limit 10
    $topics = $realDebrid->forum->topics(4, true, 2, 10);

    // Topic ID: 4, Meta, Limit 10, Offset 1
    $topics = $realDebrid->forum->topics(null, true, 2, 10, 1);
Response handlers
=================

A **Response Handler** is an object that will be used to handle the response of an specific request.

.. note::

    Be default, all the API requests are using the :literal:`RealDebrid\\Response\\Handlers\\DefaultResponseHandler` handler which is simply returning the decoded json (:literal:`Array` or :literal:`stdClass`).


.. _creating-it:

Creating it
-----------

To create your own response handler, you must:

* add your handler under the the :literal:`RealDebrid\\Response\\Handlers` namespace
* make it extends the :literal:`AbstractResponseHandler` (to access the getJson() method)
* make it implements the :literal:`ResponseHandler` interface, to implement the handle() method
* add your model object that matches the API response

Example
^^^^^^^

This is an example for the :literal:`\\RealDebrid\\RealDebrid()->user->get()` method.

First, create your model object:

.. code-block:: php

    <?php
    class User extends AbstractResponse {
        private $id;
        private $username;
        private $email;
        private $points;
        private $locale;
        private $avatar;
        private $type;
        private $premium;
        private $expiration;

        public function __construct($json) {
            parent::__construct($json);

            $this->id = $json->id;
            $this->username = $json->username;
            $this->email = $json->email;
            $this->points = $json->points;
            $this->locale = $json->locale;
            $this->avatar = $json->avatar;
            $this->type = $json->type;
            $this->premium = $json->premium;
            $this->expiration = new Carbon($json->expiration);
        }

        // Create your getters and setters
    }

Then, create the response handler that will populate your new model:

.. code-block:: php

    <?php
    use RealDebrid\Response\User;

    class UserHandler extends AbstractResponseHandler implements ResponseHandler {

        public function handle(ResponseInterface $response, ClientInterface $client) {
            return new User($this->getJson($response));
        }
    }

.. _using-it:

Using it
--------

The Response Handlers must be used in the :literal:`RealDebrid\\Api` classes.

Example
^^^^^^^

This is how to use the :literal:`RealDebrid\\Response\\Handlers\\User\\UserHandler` we created previously.

.. code-block:: php

    <?php
    class User extends EndPoint {

        public function get() {
            return $this->request(new UserRequest($this->token), new UserHandler());
        }
    }

As you can see, the UserHandler is instantiated as the second parameter of the request() method.

From now on, the :literal:`\\RealDebrid\\RealDebrid()->user->get()` method will return a :literal:`RealDebrid\\Response\\User` object rather than an stdClass.
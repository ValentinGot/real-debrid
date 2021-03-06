<?php

namespace RealDebrid\Request;
use RealDebrid\Exception\MalformedParameterException;

/**
 * Class UriBuilder
 *
 * @package RealDebrid\Request
 * @author Valentin GOT
 */
class UriBuilder {
    private $request;

    public function __construct(AbstractRequest $request) {
        $this->request = $request;
    }

    /**
     * Formats the uri for a Request object.
     *
     * Parts of the uri that start with an
     * ":" are the parameters of the uri. This method initiates the formatting process
     * for such an uri by getting the parameters first, and with the name of a parameter,
     * i'ts value can be retrieved. The value is either stored inside a public property of
     * the request object. Or it can be retrieved by a getter.
     * It also add the query parameters add the end of the URI
     * @param AbstractRequest $request
     * @return string
     */
    public static function format(AbstractRequest $request) {
        $builder = new static($request);

        $parts = $builder->getParametersInUri();
        $values = $builder->getValuesFromUriParameters($parts);
        $uri = $builder->formatUri($values);
        if (!$request->getQueryParams()->isEmpty())
            $uri .=  '?' . http_build_query($request->getQueryParams()->toArray());

        return $uri;
    }

    /**
     * Gets all parameters inside the uri as an array
     *
     * @return array
     */
    private function getParametersInUri() {
        $url = $this->request->getUri();
        $parts = explode("/:", $url);
        unset($parts[0]);

        return $parts;

    }

    /**
     * Gets the values for all the parameters that are retrieved by getParametersInUri.
     *
     * When all the parameters are retrieved, it returns an associative array of [parameter => value]
     * If one parameter fails to be retrieved, it results in a MalformedParameterException.
     * @param array $parameters
     * @return array
     * @throws MalformedParameterException
     */
    private function getValuesFromUriParameters(array $parameters) {
        $values = [];

        foreach ($parameters as $parameter) {
            $parameter = $this->stripTrailingPart($parameter);
            $values[$parameter] = $this->getValueFromParameter($parameter);
        }

        return $values;
    }

    /**
     * Get the value for the parameter that is prefixed with a ":" inside the url.
     *
     * It can be retrieved by a getter (get+ParameterName) or by assigning the value
     * to a public property with the same name as the url parameter.
     * $url = "torrents/info/:id" becomes "torrents/info/ABCDEFG" when $request::username is set to "ABCDEFG"
     * @param $parameter
     * @return mixed
     * @throws MalformedParameterException
     */
    private function getValueFromParameter($parameter) {
        $getter = $this->getValueGetter($parameter);
        if (method_exists($this->request, $getter))
            return $this->request->{$getter}();
        if (property_exists($this->request, $parameter))
            return $this->request->{$parameter};
        throw new MalformedParameterException;
    }

    /**
     * @param $parameter
     * @return string
     */
    private function getValueGetter($parameter) {
        return "get" . $this->toCamelCase($parameter);
    }

    /**
     * @param $parameter
     * @return mixed|string
     */
    private function toCamelCase($parameter) {
        $words = str_replace('_', ' ', $parameter);
        $camelCase = str_replace(' ', '', ucwords($words));

        return $camelCase;
    }

    /**
     * Formats the uri, it replaces the parameters with the values it has retrieved from the request object.
     *
     * @param $values
     * @return mixed
     */
    private function formatUri($values) {
        $uri = $this->request->getUri();
        foreach ($values as $parameter => $value)
            $uri = str_replace(":" . $parameter, $value, $uri);
        return $uri;
    }

    /**
     * @param $parameter
     * @return string
     */
    private function stripTrailingPart($parameter) {
        if (strstr($parameter, "/")) {
            $pos = strpos($parameter, "/");
            $parameter = substr($parameter, 0, $pos);
        }

        return $parameter;
    }
}
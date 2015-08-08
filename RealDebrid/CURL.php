<?php

namespace RealDebrid;

class CURL {
    public static $API = 'https://real-debrid.com/';
    public static $COOKIE_FILE_PATH = sys_get_temp_dir() . '/realdebrid-auth.txt';

    /**
     * Execute a cURL request
     *
     * @param string $url URL
     * @param array $opts Array of cURL options
     * @return mixed cURL response
     * @throws \Exception
     */
    public static function exec($url, array $opts = array()) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, self::$API . $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_NOBODY, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_COOKIEJAR, self::$COOKIE_FILE_PATH);
        curl_setopt($ch, CURLOPT_COOKIEFILE, self::$COOKIE_FILE_PATH);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt_array($ch, $opts);

        if (!($resp = curl_exec($ch)))
            throw new \Exception(curl_error($ch));
        curl_close($ch);

        return $resp;
    }

    /**
     * Read the real-debrid cookie
     *
     * @return \stdClass Cookie content
     */
    public static function cookie() {
        $cookie = array();

        foreach(file(self::$COOKIE_FILE_PATH) as $line) {
            if($line[0] != '#' && substr_count($line, "\t") == 6) {
                $variable = explode("\t", $line);
                $variable = array_map('trim', $variable);

                $cookie[$variable[5]] = (object) array(
                    'domain' => $variable[0],
                    'flag' => $variable[1],
                    'path' => $variable[2],
                    'secure' => $variable[3],
                    'expiration' => $variable[4],
                    'value' => $variable[6]
                );
            }
        }

        return (object) $cookie;
    }
}
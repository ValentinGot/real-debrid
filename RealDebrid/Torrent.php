<?php

namespace RealDebrid;

use RealDebrid\Exception\ForbiddenException;

class Torrent extends Base {

    /**
     * Add torrent
     *
     * @param string $magnet Magnet link
     * @return bool TRUE torrent has been successfully added; FALSE otherwise
     * @throws ForbiddenException User is not authenticated
     */
    public function add($magnet) {
        if(!$this->is_authenticated())
            throw new ForbiddenException;

        // Convert
        $id = $this->convert($magnet);

        // Error at torrent convertion
        if(is_null($id))
            return false;

        // Start
        $this->start($id);

        return true;
    }

    /**
     * Return torrents status
     *
     * @return \stdClass Torrents status
     * @throws ForbiddenException User is not authenticated
     */
    public function status() {
        if(!$this->is_authenticated())
            throw new ForbiddenException;

        $status = CURL::exec('ajax/torrent.php?action=status_a');

        return json_decode($status);
    }

    /**
     * Convert the torrent
     *
     * @param string $magnet Magnet link
     * @return int|null The torrent ID; or NULL if an error occurred
     * @throws \Exception
     */
    private function convert($magnet) {
        $curl_opts[CURLOPT_REFERER] = CURL::$API . 'torrents';
        $curl_opts[CURLOPT_POST] = true;
        $curl_opts[CURLOPT_POSTFIELDS] = array(
            'magnet' => $magnet,
            'splitting_size' => 50,
            'hoster' => 'utb'
        );
        $curl_opts[CURLOPT_HTTPHEADER] = array('Content-Type: multipart/form-data');

        $resp = CURL::exec('torrents', $curl_opts);
        if(preg_match('/torrent_files.php\?id=([A-Za-z0-9]+)/', $resp, $matches))
            return $matches[1];
        return null;
    }

    /**
     * Start torrent
     *
     * @param int $id Torrent ID
     * @throws \Exception
     */
    private function start($id) {
        $curl_opts[CURLOPT_REFERER] = CURL::$API . 'torrents';
        $curl_opts[CURLOPT_POST] = true;
        $curl_opts[CURLOPT_POSTFIELDS] = 'files_unwanted=&start_torrent=1';
        $curl_opts[CURLOPT_HTTPHEADER] = array('Content-Type: application/x-www-form-urlencoded');

        CURL::exec('ajax/torrent_files.php?id=' . $id, $curl_opts);
    }
}
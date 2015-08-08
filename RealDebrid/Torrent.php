<?php

namespace RealDebrid;

class Torrent extends Base {

    /**
     * Add torrent
     *
     * @param string $magnet Magnet link
     * @return int|null The torrent ID; or NULL if an error occurred
     */
    public function add($magnet) {
        $this->must_be_authenticated();

        $id = $this->convert($magnet);

        // Error at torrent convertion
        if(is_null($id))
            return null;

        $this->start($id);

        return $id;
    }

    /**
     * Return torrents status
     *
     * @return \stdClass Torrents status
     * @throws \Exception
     */
    public function status() {
        $this->must_be_authenticated();

        $status = CURL::exec($this->base_url . 'ajax/torrent.php?action=status_a', $this->curl_opts);

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
        $curl_opts = $this->curl_opts;
        $curl_opts[CURLOPT_REFERER] = $this->base_url . 'torrents';
        $curl_opts[CURLOPT_POST] = true;
        $curl_opts[CURLOPT_POSTFIELDS] = array(
            'magnet' => $magnet,
            'splitting_size' => 50,
            'hoster' => 'utb'
        );
        $curl_opts[CURLOPT_HTTPHEADER] = array('Content-Type: multipart/form-data');

        $resp = CURL::exec($this->base_url . 'torrents', $curl_opts);
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
        $curl_opts = $this->curl_opts;
        $curl_opts[CURLOPT_REFERER] = $this->base_url . 'torrents';
        $curl_opts[CURLOPT_POST] = true;
        $curl_opts[CURLOPT_POSTFIELDS] = 'files_unwanted=&start_torrent=1';
        $curl_opts[CURLOPT_HTTPHEADER] = array('Content-Type: application/x-www-form-urlencoded');

        CURL::exec($this->base_url . 'ajax/torrent_files.php?id=' . $id, $curl_opts);
    }
}
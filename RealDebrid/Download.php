<?php

namespace RealDebrid;

use RealDebrid\Exception\ForbiddenException;

class Download extends Base {

    /**
     * Unrestrict a link
     *
     * @param string $link Link of the file
     * @param string $password Optionally tell the password to the file
     * @return \stdClass Unrestricted link
     * @throws \Exception
     */
    public function unrestrict($link, $password = '') {
        if(!$this->is_authenticated())
            throw new ForbiddenException;

        $resp = CURL::exec('ajax/unrestrict.php?out=json&link=' . $link . '&password=' . $password);
        $resp = json_decode($resp);

        // Error handling
        if($resp->error > 0)
            throw new \Exception($resp->message);

        return $resp;
    }
}
<?php

namespace RealDebrid\Api;
use RealDebrid\Request\Settings\SettingsRequest;

/**
 * /settings namespace
 *
 * Provides a set of methods to retrieve or update your Real-Debrid settings
 * @package RealDebrid\Api
 * @author Valentin GOT
 * @license MIT
 * @api
 */
class Settings extends EndPoint {

    /**
     * The download port setting
     */
    const DOWNLOAD_PORT = 'download_port';

    /**
     * The Real-Debrid locale
     */
    const LOCALE = 'locale';

    /**
     * The streaming language preference
     */
    const STREAMING_LANGUAGE_PREFERENCE = 'streaming_language_preference';

    /**
     * The streaming quality preference
     */
    const STREAMING_QUALITY = 'streaming_quality';

    /**
     * The streaming quality preference (on mobiles)
     */
    const MOBILE_STREAMING_QUALITY = 'mobile_streaming_quality';

    /**
     * The streaming cast audio preference
     */
    const STREAMING_CAST_AUDIO_PREFERENCE = 'streaming_cast_audio_preference';

    /**
     * Get current user settings with possible values to update
     *
     * @return \stdClass Current user settings
     */
    public function get() {
        return $this->request(new SettingsRequest($this->token));
    }

    /**
     * Update a user setting
     *
     * @param string $name Setting name (class constants)
     * @param string $value Possible values are available in /settings
     */
    public function update($name, $value) {

    }

    /**
     * Convert fidelity points
     */
    public function convertPoints() {

    }

    /**
     * Disable user logs
     *
     * Warning: This action is currently irreversible, take care
     */
    public function disableLogs() {

    }

    /**
     * Send the verification email to change the password
     */
    public function changePassword() {

    }

    /**
     * Upload a new user avatar image
     */
    public function addAvatar() {
        // TODO Upload avatar
    }

    /**
     * Reset user avatar image to default
     */
    public function deleteAvatar() {

    }
}
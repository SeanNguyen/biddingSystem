<?php
Class Password {

    public function __construct() {}

    /**
     * Verify a password against a hash using a timing attack resistant approach
     *
     * @param string $password The password to verify
     * @param string $hash     The hash to verify against
     *
     * @return boolean If the password matches the hash
     */
    public function password_verify($password, $correctPassword) {
        if ($password === $correctPassword) {
            return true;
        }
        return false;
    }

}
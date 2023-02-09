<?php

class SessionManager
{
    /**
     * Start the session
     *
     * @return void
     */
    public static function startSession(): void
    {
        session_start();
    }

    /**
     * Destroy the session
     *
     * @return void
     */
    public static function destroySession(): void
    {
        session_destroy();
    }

    /**
     * Set a session variable
     *
     * @param string $key
     * @param string $value
     * @return void
     */
    public static function set(string $key, string $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Get a session variable
     *
     * @param string $key
     * @return string
     */
    public static function get(string $key): string
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return false;
    }

    /**
     * Check if the user is logged in
     *
     * @return bool
     */
    public static function check(): bool
    {
        if (self::get('logged_in')) {
            return true;
        }
        return false;
    }
}
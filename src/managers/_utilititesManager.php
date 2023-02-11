<?php

use JetBrains\PhpStorm\NoReturn;

require_once(dirname(__FILE__) . "/../managers/_sessionManager.php");

class UtilitiesManager
{
    
    #[NoReturn] public static function redirect($path): void
    {
        header("Location: " . $path);
        exit();
    }

    public static function makeRedirectLink($path): string
    {
        return "http://" . $_SERVER['HTTP_HOST'] . "/" . $path;
    }

    public static function checkIfLoggedIn(): void
    {
        if (!SessionManager::check()) {
            UtilitiesManager::redirect("src/models/auth/index.php");
        }
    }
}
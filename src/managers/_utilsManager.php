<?php

use JetBrains\PhpStorm\NoReturn;

require_once(dirname(__FILE__, 2)."/utilities/_configuration.php");

class UtilsManager
{
    /**
     * Routes
     *
     * @var array|string[]
     */
    public static array $routes = [
            'status'                      => '/'.Configuration::BASE_URL.'/src/models/status/index.php',
            'pembayaran_transaksi'        => '/'.Configuration::BASE_URL.'/src/models/pembayaran/transaksi/index.php',
            'pembayaran_transaksi_tambah' => '/'.Configuration::BASE_URL.'/src/models/pembayaran/transaksi/transaksi_tambah.php?nisn={nisn}',
    ];

    /*
     * Redirect to a specific path
     */
    #[NoReturn] public static function redirect(string $path): void
    {
        header("Location: ".$path);
        exit();
    }

    /**
     * Generate a route
     *
     * @param  string  $name
     * @param  array  $params
     *
     * @return string
     */
    public static function generateRoute(string $name, array $params = []): string
    {
        if (!isset(self::$routes[$name])) {
            return '';
        }

        $url = self::$routes[$name];

        foreach ($params as $key => $value) {
            $url = str_replace("{{$key}}", $value, $url);
        }

        return $url;
    }

    /**
     * Check if the user is logged in
     *
     * @return void
     */
    public static function isLoggedIn(): void
    {
        if (!SessionManager::check()) {
            self::redirect(self::generateRoute('auth'));
        }
    }

    /**
     * Check if the user's account is activated
     *
     * @return void
     */
    public static function isAccountActivated(): void
    {
        if (!SessionManager::checkStatus()) {
            self::redirect(self::generateRoute('status'));
        }
    }

    /**
     * Check if the user is an administrator or above
     *
     * @param  RoleManager  $roleManager
     *
     * @return void
     */
    public static function isAdministratorOrAbove(RoleManager $roleManager): void
    {
        if (!$roleManager->checkMinimumRole(RoleEnumeration::ADMINISTRATOR)) {
            self::redirect(self::generateRoute('home'));
        }
    }

    /**
     * Get a query from the the GET method
     *
     * @param  string  $key
     *
     * @return string
     */
    public static function getQueryQuery(string $key): string
    {
        return $_GET[$key];
    }

    /**
     * Get a query from the POST method
     *
     * @param  string  $key
     *
     * @return string
     */
    public static function getPostQuery(string $key): string
    {
        return $_POST[$key];
    }

    /**
     * Generate input fields
     *
     * @param  array  $inputs
     *
     * @return string
     */
    public static function generateInputFields(array $inputs): string
    {
        $inputFields = "";

        foreach ($inputs as $input) {
            $type = $input['type'] ?? 'text';
            $label = $input['label'];
            $name = $input['name'];
            $value = (isset($_POST[$name])) ? $_POST[$name] : ((isset($input['value']) && $input['value'] != "") ? $input['value'] : "");
            $iconClass = $input['iconClass'] ?? 'fas fa-tag';
            $required = $input['required'] ?? true;
            $disabled = $input['disabled'] ?? false;
            $options = $input['options'] ?? [];

            $inputFields .= "<label for='".$name."'>".$label."</label>";
            $inputFields .= "<div class='input-group mb-3'>";
            $inputFields .= "<div class='input-group-append'>";
            $inputFields .= "<div class='input-group-text'>";
            $inputFields .= "<span class='".$iconClass."'></span>";
            $inputFields .= "</div>";
            $inputFields .= "</div>";

            if ($type == 'text') {
                $inputFields .= "<input type='text' class='form-control' placeholder='".$label."'";
                $inputFields .= ($disabled ? " disabled" : "");
                $inputFields .= " name='".$name."' value='".$value."' ".($required ? "required" : "").">";
            } elseif ($type == 'select') {
                $inputFields .= "<select class='form-control' name='".$name."' ".($required ? "required" : "").">";
                foreach ($options as $key => $option) {
                    $selected = ($value == $key) ? "selected" : "";
                    $inputFields .= "<option value='".$key."' ".$selected.">".$option."</option>";
                }
                $inputFields .= "</select>";
            } elseif ($type == 'number') {
                $inputFields .= "<input type='number' pattern='[0-9]+' class='form-control' placeholder='".$label."'";
                $inputFields .= ($disabled ? " disabled" : "");
                $inputFields .= " name='".$name."' value='".$value."' ".($required ? "required" : "").">";
            } elseif ($type == 'date') {
                $inputFields .= "<input type='date' class='form-control' placeholder='".$label."'";
                $inputFields .= ($disabled ? " disabled" : "");
                $inputFields .= " name='".$name."' value='".$value."' ".($required ? "required" : "").">";
            }

            $inputFields .= "</div>";
        }

        return $inputFields;
    }
}
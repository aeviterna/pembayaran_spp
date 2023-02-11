<?php

require_once(dirname(__FILE__) . "/_configuration.php");

$routes = [
    'home' => '/',
    'logout' => '/pwpb/pembayaran_spp/src/models/auth/logout.php',
];

function generateUrl($name, $params = [])
{
    global $routes;

    if (!isset($routes[$name])) {
        return '';
    }

    $url = $routes[$name];

    foreach ($params as $key => $value) {
        $url = str_replace("{{$key}}", $value, $url);
    }

    return $url;
}

$profileUrl = generateUrl('profile', ['id' => 123]);

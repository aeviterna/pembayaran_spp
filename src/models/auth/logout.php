<?php

require_once(dirname(__FILE__, 4) . "/src/managers/_authenticationManager.php");
require_once(dirname(__FILE__, 4) . "/src/managers/_utilititesManager.php");

$authenticationManager = new AuthenticationManager();
SessionManager::startSession();
SessionManager::destroySession();

header("Location: index.php");


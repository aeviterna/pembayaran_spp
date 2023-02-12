<?php

require_once(dirname(__FILE__, 4) . "/src/managers/_sessionManager.php");

SessionManager::startSession();
SessionManager::destroySession();

header("Location: index.php");


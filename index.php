<?php

require_once(dirname(__FILE__) . "/src/managers/_utilititesManager.php");
require_once(dirname(__FILE__) . "/src/managers/_sessionManager.php");
require_once(dirname(__FILE__) . "/src/utilities/_generateUrl.php");
SessionManager::startSession();
UtilitiesManager::checkIfLoggedIn();

?>

<!doctype html>
<html lang="en">
<head>
    <?php
    $headTitle = "Utama";

    require_once(dirname(__FILE__) . "/src/components/_head.php");
    require_once(dirname(__FILE__) . "/src/components/_modal.php");
    ?>
</head>
<body class="hold-transition layout-navbar-fixed layout-fixed light-mode" id="body-theme">
<div class="container">
    <h1 class="h1">Index</h1>
    <p class="p mt-2">
        <?php

        echo "Logged in as ";
        echo SessionManager::get("username") ? $username = SessionManager::get("username") : $username = SessionManager::get("nisn");

        ?>
    </p>
    <p class="p mt-4">
        <a href="<?php echo generateUrl('logout'); ?>" class="btn btn-primary">Logout</a>
    </p>
</div>
</body>
</html>


<?php

require_once(dirname(__FILE__, 2)."/managers/_sessionManager.php");
require_once(dirname(__FILE__, 2)."/managers/_utilsManager.php");
require_once(dirname(__FILE__, 2)."/utilities/_functions.php");
require_once(dirname(__FILE__, 2)."/utilities/_enumeration.php");

SessionManager::startSession();
UtilsManager::isLoggedIn();
UtilsManager::isAccountActivated();

//SessionManager::set("username", "aeviterna");
//SessionManager::set("id", 57);
//SessionManager::set("logged_in", true);
//SessionManager::set("is_siswa", false);
//SessionManager::set("status", 1);
//SessionManager::set("role", RoleEnumeration::ADMINISTRATOR);


$pageItemObject = [
        'title'      => 'Utama',
        'breadcrumb' => [
                [
                        'title' => 'Utama',
                        'link'  => UtilsManager::generateRoute('utama')
                ],
        ]
];

?>

<!doctype html>
<html lang="en">
<head>
    <?php
    $headTitle = "Utama";

    require_once(dirname(__FILE__, 2)."/components/_head.php");
    require_once(dirname(__FILE__, 2)."/components/_modal.php");
    ?>
</head>

<body class="hold-transition layout-navbar-fixed layout-fixed light-mode" id="body-theme">
<div class="wrapper">
    <?php
    $navigationActive = array(1, null);

    include_once(dirname(__FILE__, 2)."/components/_navigation.php");

    ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm">
                        <div class="card p-2">
                            <?php
                            require_once(dirname(__FILE__, 2)."/components/_contentHead.php");
                            ?>
                            <div class="card-body">
                                <p class="p">
                                    Selamat Datang di dashboard sistem pembayaran SPP.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once(dirname(__FILE__, 2)."/components/_script.php");
?>
</body>
</html>


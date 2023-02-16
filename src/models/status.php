<?php

require_once(dirname(__FILE__, 2)."/managers/_sessionManager.php");
require_once(dirname(__FILE__, 2)."/utilities/_functions.php");

SessionManager::startSession();
checkIfLoggedIn();
?>

<!doctype html>
<html lang="en">
<head>
    <?php
    $headTitle = "Status Aktivasi";

    require_once(dirname(__FILE__, 2)."/components/_head.php");
    ?>
</head>
<body class="hold-transition layout-navbar-fixed layout-fixed light-mode" id="body-theme">

<div class="wrapper">
    <div class="preloader flex-column justify-content-center align-items-center">
        <h1 class="animated bounceIn">Pembayaran SPP</h1>
    </div>

    <div style="padding: 24px; margin-top: 46px; text-align: center;">
        <h1 class="h1">Status Akun <strong>
                "<?php
                echo SessionManager::get('username'); ?>"
            </strong></h1>
        <p class="p">
            Status akun anda saat ini adalah <strong>Tidak Teraktivasi</strong>. <br>
            Silahkan hubungi administrator untuk mengaktifkan akun anda.
        </p>
        <a href="<?php
        echo generateUrl('auth'); ?>" class="btn btn-primary">Pusat Login/Register</a>
    </div>
</div>

<?php
require_once(dirname(__FILE__, 2)."/components/_script.php");
?>
</body>
</html>


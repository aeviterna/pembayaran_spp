<?php
require_once(dirname(__FILE__, 3) . "/managers/_utilititesManager.php");
?>
<!doctype html>
<html lang="en">
<head>
    <?php
    $headTitle = "Pusat Register/Login";

    require_once(dirname(__FILE__, 4) . "/src/components/_head.php");
    require_once(dirname(__FILE__, 4) . "/src/components/_modal.php");
    ?>
</head>
<body class="hold-transition login-page" id="body-theme">
<div class="login-box" id="login-container">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="/pwpb/pembayaran_spp" class="h1"><b>Pembayaran
                    SPP</b></a>
            <p class="p-2">Pusat Register dan Login</p>
        </div>
        <div class="card-body">
            <a href="register_siswa.php" class="btn btn-primary btn-block">Register Siswa</a>
            <a href="register_petugas.php" class="btn btn-primary btn-block">Register Petugas</a>
            <a href="login_siswa.php" class="btn btn-primary btn-block">Login Siswa</a>
            <a href="login_petugas.php" class="btn btn-primary btn-block">Login Petugas</a>
        </div>
    </div>
</div>

<div class="title is-6 m-1 p-0"><b>Copyright © <?php echo date("Y"); ?> XII RPL</b></div>

</body>
</html>
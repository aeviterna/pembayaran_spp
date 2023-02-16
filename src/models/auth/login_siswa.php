<?php

require_once(dirname(__FILE__, 4)."/src/managers/_authenticationManager.php");
require_once(dirname(__FILE__, 4)."/src/managers/_utilsManager.php");
require_once(dirname(__FILE__, 4)."/src/definitions/siswa/_loginSiswaDataDefinition.php");
SessionManager::startSession();
?>

<!doctype html>
<html lang="en">
<head>
    <?php
    $headTitle = "Login Siswa";

    require_once(dirname(__FILE__, 4)."/src/components/_head.php");
    require_once(dirname(__FILE__, 4)."/src/components/_modal.php");
    ?>
</head>
<body class="hold-transition login-page" id="body-theme">
<div class="login-box" id="login-container">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?php
            echo UtilsManager::generateRoute('landing_page') ?>" class="h1"><b>Pembayaran SPP</b></a>
            <p class="p-2">Login Siswa</p>
        </div>
        <div class="card-body">
            <form action="<?php
            echo $_SERVER['PHP_SELF']; ?>" METHOD="post"
                  onsubmit="return confirmModal('form', this, 'login-container');">

                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>

                        </div>
                    </div>
                    <input type="number" class="form-control" placeholder="NISN" name="nisn"
                           value="<?php
                           echo $_POST['nisn'] ?? null ?>" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <input type="password" class="form-control" placeholder="Password" name="password"
                           value="<?php
                           echo $_POST['password'] ?? null ?>" required>
                </div>

                <div class="row">
                    <div class="col-sm">
                        <button type="submit" class="btn btn-primary btn-block">Login Siswa</button>
                    </div>
                </div>
            </form>
            <div class="mt-1">
                <p class="mb-0">
                    <a href="register_siswa.php" class="text-center">Register Siswa</a>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="title is-6 m-1 p-0"><b>Copyright © <?php
        echo date("Y"); ?> Yehezkiel Dio</b></div>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nisn = $_POST['nisn'] ?? null;
    $password = $_POST['password'] ?? null;

    $payload = new LoginSiswaDataDefinition($nisn, $password);
    $authenticationManager = new AuthenticationManager();
    $result = $authenticationManager->loginSiswa($payload);

    $response = json_decode($result, true);
    $status = $response['status'];
    $message = $response['message'];

    $link = UtilsManager::generateRoute('utama');
    if ($status === "success") {
        echo "<script>successModal('$message', null, 'login-container', '$link')</script>";
    } else {
        echo "<script>errorModal('$message', null, 'login-container')</script>";
    }
}

?>

</body>
</html>
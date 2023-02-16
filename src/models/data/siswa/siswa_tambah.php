<?php

require_once(dirname(__FILE__, 4)."/managers/_databaseManager.php");
require_once(dirname(__FILE__, 4)."/managers/_authenticationManager.php");
require_once(dirname(__FILE__, 4)."/managers/_sessionManager.php");
require_once(dirname(__FILE__, 4)."/managers/_roleManager.php");
require_once(dirname(__FILE__, 4)."/managers/_utilsManager.php.php");
require_once(dirname(__FILE__, 4)."/utilities/_functions.php");
require_once(dirname(__FILE__, 4)."/utilities/_enumeration.php");
require_once(dirname(__FILE__, 4)."/definitions/siswa/_registerSiswaDataDefinition.php");

SessionManager::startSession();
UtilsManager::isLoggedIn();
UtilsManager::isAccountActivated();

$roleManager = new RoleManager(SessionManager::get("role"));

if (!$roleManager->checkMinimumRole(RoleEnumeration::ADMINISTRATOR)) {
    locationRedirect(generateUrl('home'));
}

$databaseManager = new DatabaseManager();
?>

<!doctype html>
<html lang="en">
<head>
    <?php
    $headTitle = "Tambah Siswa";

    require_once(dirname(__FILE__, 4)."/components/_head.php");
    require_once(dirname(__FILE__, 4)."/components/_modal.php");
    require_once(dirname(__FILE__, 4)."/components/_dataTableHead.php");
    ?>
</head>
<body class="hold-transition layout-navbar-fixed layout-fixed light-mode" id="body-theme">
<div class="wrapper" id="wrapper">
    <?php
    $navigationActive = array(2, 1);

    include_once(dirname(__FILE__, 4)."/components/_navigation.php");

    ?>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm">
                        <div class="card p-2">
                            <?php
                            $pageItemObject = array(
                                    "title"      => "Tambah Siswa",
                                    "breadcrumb" => array(
                                            array(
                                                    "title" => "Petugas",
                                                    "link"  => generateUrl('siswa')
                                            ), array(
                                                    "title" => "Tambah Petugas",
                                                    "link"  => generateUrl('siswa_tambah')
                                            ),
                                    )
                            );
                            require_once(dirname(__FILE__, 4)."/components/_contentHead.php");
                            ?>

                            <div class="card-body" id="card-container">
                                <form action="<?php
                                echo $_SERVER['PHP_SELF']; ?>"
                                      method="post" class="row mb-2"
                                      onsubmit="return confirmModal('form', this, 'card-container');">
                                    <div class="col-sm">
                                        <label for="nisn">NISN</label>
                                        <div class="input-group mb-3">

                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>

                                            <input type="number" class="form-control" placeholder="NISN"
                                                   name="nisn"
                                                   value="<?php
                                                   echo $_POST['nisn'] ?? null ?>">
                                        </div>

                                        <label for="nis">NIS</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-tag"></span>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control" placeholder="NIS"
                                                   name="nis"
                                                   value="<?php
                                                   echo $_POST['nis'] ?? null ?>" required>
                                        </div>

                                        <label for="nama">Nama</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-tag"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Nama"
                                                   name="nis"
                                                   value="<?php
                                                   echo $_POST['nama'] ?? null ?>" required>
                                        </div>

                                        <label for="nama">Password</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-tag"></span>
                                                </div>
                                            </div>
                                            <input type="password" class="form-control" placeholder="Password"
                                                   name="password"
                                                   value="<?php
                                                   echo $_POST['password'] ?? null ?>" required>
                                        </div>

                                        <label for="alamat">Alamat</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-tag"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Alamat"
                                                   name="alamat"
                                                   value="<?php
                                                   echo $_POST['alamat'] ?? null ?>" required>
                                        </div>

                                        <label for="no_telp">No Telpon</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-tag"></span>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control" placeholder="No Telpon"
                                                   name="no_telp"
                                                   value="<?php
                                                   echo $_POST['no_telp'] ?? null ?>" required>
                                        </div>

                                        <label for="id_kelas">ID Kelas</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-tag"></span>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control" placeholder="ID Kelas"
                                                   name="id_kelas"
                                                   value="<?php
                                                   echo $_POST['id_kelas'] ?? null ?>" required>
                                        </div>

                                        <label for="id_spp">ID SPP</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-tag"></span>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control" placeholder="ID SPP"
                                                   name="id_spp"
                                                   value="<?php
                                                   echo $_POST['id_spp'] ?? null ?>" required>
                                        </div>


                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary btn-block">Buat
                                                </button>
                                            </div>
                                            <div class="col-4">
                                                <a href="<?php
                                                echo generateUrl('petugas'); ?>"
                                                   class="btn btn-warning btn-block"
                                                >Kembali
                                                </a>
                                            </div>
                                        </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once(dirname(__FILE__, 4)."/components/_script.php");
require_once(dirname(__FILE__, 4)."/components/_dataTableScript.php");
?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nisn = $_POST['nisn'] ?? null;
    $nis = $_POST['nis'] ?? null;
    $nama = $_POST['nama'] ?? null;
    $password = $_POST['password'] ?? null;
    $alamat = $_POST['alamat'] ?? null;
    $no_telp = $_POST['no_telp'] ?? null;
    $id_kelas = $_POST['id_kelas'] ?? null;
    $id_spp = $_POST['id_spp'] ?? null;

//    $payload =

//    $payload = new RegisterPetugasDataDefinition($nama, $username, $password, $id_level);
//    $authenticationManager = new AuthenticationManager();
//    $result = $authenticationManager->registerPetugas($payload);
//
//    $response = json_decode($result, true);
//    $status = $response['status'];
//    $message = $response['message'];
//
//    if ($status === "success") {
//        echo "<script>successModal('$message', 'index.php', 'login-container')</script>";
//    } else {
//        echo "<script>errorModal('$message', null, 'login-container')</script>";
//    }

}
?>

</body>
</html>


<?php

require_once(dirname(__FILE__, 4)."/managers/_databaseManager.php");
require_once(dirname(__FILE__, 4)."/managers/_sessionManager.php");
require_once(dirname(__FILE__, 4)."/managers/_roleManager.php");
require_once(dirname(__FILE__, 4)."/managers/_utilsManager.php");
require_once(dirname(__FILE__, 4)."/utilities/_functions.php");
require_once(dirname(__FILE__, 4)."/utilities/_enumeration.php");
require_once(dirname(__FILE__, 4)."/definitions/siswa/_updateSiswaDataDefinition.php");

SessionManager::startSession();
UtilsManager::isLoggedIn();
UtilsManager::isAccountActivated();

$roleManager = new RoleManager(SessionManager::get("role"));

if (!$roleManager->checkMinimumRole(RoleEnumeration::ADMINISTRATOR)) {
    locationRedirect(generateUrl('home'));
}

$id = $_GET["id"];
$databaseManager = new DatabaseManager();

$session_id = SessionManager::get("id");
$result = $databaseManager->read("petugas", "id_level", "id_petugas = '$session_id'");
$result = $result->fetch_assoc();

if ($result["id_level"] > SessionManager::get("role")) {
    locationRedirect(generateUrl('home'));
}
?>

<!doctype html>
<html lang="en">
<head>
    <?php
    $headTitle = "Hapus Siswa";

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
                                    "title"      => "Hapus Siswa",
                                    "breadcrumb" => array(
                                            array(
                                                    "title" => "Siswa",
                                                    "link"  => generateUrl('petugas')
                                            ), array(
                                                    "title" => "Hapus Siswa",
                                                    "link"  => generateUrl('petugas_ubah', ['id' => $_GET['id']])
                                            ),
                                    )
                            );
                            require_once(dirname(__FILE__, 4)."/components/_contentHead.php");
                            ?>

                            <div class="card-body" id="card-container">
                                <form action="<?php
                                echo $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']; ?>"
                                      method="post" class="row mb-2"
                                      onsubmit="return confirmModal('form', this, 'card-container');">
                                    <div class="col-sm">
                                        <?php
                                        $result = $databaseManager->read("siswa", "*", "nisn = '$id'",
                                                "AND dihapus = '0'");
                                        $result = $result->fetch_assoc();
                                        ?>

                                        <label for="nisn">NISN</label>
                                        <div class="input-group mb-3">

                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>

                                            <input type="text" class="form-control" placeholder="NISN"
                                                   name="username"
                                                   disabled
                                                   value="<?php
                                                   echo $_POST['nisn'] ?? $result['nisn'] ?>">
                                        </div>

                                        <label for="nis">NIS</label>
                                        <div class="input-group mb-3">

                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>

                                            <input type="text" class="form-control" placeholder="nis"
                                                   name="username"
                                                   disabled
                                                   value="<?php
                                                   echo $_POST['nis'] ?? $result['nis'] ?>">
                                        </div>

                                        <label for="nama">Nama</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-tag"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Nama Siswa"
                                                   name="nama"
                                                   disabled
                                                   value="<?php
                                                   echo $_POST['nama'] ?? $result['nama'] ?>" required>
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
                                                   disabled
                                                   value="<?php
                                                   echo $_POST['alamat'] ?? $result['alamat'] ?>" required>
                                        </div>

                                        <label for="alamat">No Telpon</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-tag"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="No Telpon"
                                                   name="no_telp"
                                                   disabled
                                                   value="<?php
                                                   echo $_POST['no_telp'] ?? $result['no_telp'] ?>" required>
                                        </div>

                                        <label for="id_kelas">ID Kelas</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-tag"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="ID Kelas"
                                                   name="id_kelas"
                                                   disabled
                                                   value="<?php
                                                   echo $_POST['id_kelas'] ?? $result['id_kelas'] ?>" required>
                                        </div>

                                        <label for="id_spp">ID SPP</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-tag"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="ID SPP"
                                                   name="id_spp"
                                                   disabled
                                                   value="<?php
                                                   echo $_POST['id_spp'] ?? $result['id_spp'] ?>" required>
                                        </div>


                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary btn-block">Hapus
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
//    $payload = new UpdateSiswaDataDefinition($_POST['nama'], $_POST['username'], $_POST['level'], $_POST['status']);
//
//    try {
//        $set = "dihapus = '1'";
//        $result = $databaseManager->update("petugas", $set, "id_petugas = '$id'");
//
//        if ($result) {
//            echo "<script>successModal('Sukses', 'index.php', 'card-container')</script>";
//        } else {
//            echo "<script>errorModal('Gagal', null, 'card-container')</script>";
//        }
//
//    } catch (Exception $e) {
//        $error = str_replace("'", "", $e->getMessage());
//        echo "<script>errorModal('$error', null, 'card-container')</script>";
//    }

}
?>

</body>
</html>


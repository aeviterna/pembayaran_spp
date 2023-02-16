<?php

require_once(dirname(__FILE__, 4)."/managers/_databaseManager.php");
require_once(dirname(__FILE__, 4)."/managers/_sessionManager.php");
require_once(dirname(__FILE__, 4)."/managers/_roleManager.php");
require_once(dirname(__FILE__, 4)."/managers/_utilsManager.php");
require_once(dirname(__FILE__, 4)."/utilities/_functions.php");
require_once(dirname(__FILE__, 4)."/utilities/_enumeration.php");
require_once(dirname(__FILE__, 4)."/definitions/petugas/_konfirmasiPasswordPetugasDataDefinition.php");

SessionManager::startSession();
UtilsManager::isLoggedIn();
UtilsManager::isAccountActivated();

$roleManager = new RoleManager(SessionManager::get("role"));

if (!$roleManager->checkMinimumRole(RoleEnumeration::ADMINISTRATOR)) {
    locationRedirect(generateUrl('home'));
}

$id = $_GET["id"];
$databaseManager = new DatabaseManager();

$result = $databaseManager->read("petugas", "id_level", "id_petugas = '$id'");
$result = $result->fetch_assoc();

if ($result["id_level"] > SessionManager::get("role")) {
    locationRedirect(generateUrl('home'));
}
?>

<!doctype html>
<html lang="en">
<head>
    <?php
    $headTitle = "Ubah Password Petugas";

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
                                    "title"      => "Ubah Password Petugas",
                                    "breadcrumb" => array(
                                            array(
                                                    "title" => "Petugas",
                                                    "link"  => generateUrl('petugas')
                                            ), array(
                                                    "title" => "Ubah Password",
                                                    "link"  => generateUrl('petugas_ubah_password',
                                                            ['id' => $_GET['id']])
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
                                        $result = $databaseManager->read("petugas", "*", "id_petugas = '$id'",
                                                "AND dihapus = '0'");
                                        $result = $result->fetch_assoc();
                                        ?>

                                        <label for="password">Password</label>
                                        <div class="input-group mb-3">

                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>

                                            <input type="text" class="form-control" placeholder="Password"
                                                   name="password"
                                                   value="<?php
                                                   echo $_POST['password'] ?? null ?>">
                                        </div>

                                        <label for="konfirmasi_password">Konfirmasi Password</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-tag"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Konfirmasi Password"
                                                   name="konfirmasi_password"
                                                   value="<?php
                                                   echo $_POST['konfirmasi_password'] ?? null ?>" required>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary btn-block">Ubah Password
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
    $password = $_POST["password"];
    $konfirmasi_password = $_POST["konfirmasi_password"];
    try {
        if ($password == $konfirmasi_password) {
            $password = password_hash($password, PASSWORD_ARGON2I);

            $set = "password = '$password'";
            $result = $databaseManager->update("petugas", $set, "id_petugas = '$id'");

            if ($result) {
                echo "<script>successModal('Sukses', 'index.php', 'card-container')</script>";
            } else {
                echo "<script>errorModal('Gagal 1', null, 'card-container')</script>";
            }
        } else {
            echo "<script>errorModal('Gagal 2', null, 'card-container')</script>";
        }
    } catch (Exception $e) {
        $error = str_replace("'", "", $e->getMessage());
        echo "<script>errorModal('$error', null, 'card-container')</script>";
    }

}
?>

</body>
</html>


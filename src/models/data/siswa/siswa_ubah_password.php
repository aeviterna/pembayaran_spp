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

$roleManager = new RoleManager(SessionManager::get("role"));

if (!$roleManager->checkMinimumRole(RoleEnumeration::ADMINISTRATOR)) {
    locationRedirect(generateUrl('home'));
}
?>

<!doctype html>
<html lang="en">
<head>
    <?php
    $headTitle = "Ubah Password Siswa";

    require_once(dirname(__FILE__, 4)."/components/_head.php");
    require_once(dirname(__FILE__, 4)."/components/_modal.php");
    require_once(dirname(__FILE__, 4)."/components/_dataTableHead.php");
    ?>
</head>
<body class="hold-transition layout-navbar-fixed layout-fixed light-mode" id="body-theme">
<div class="wrapper" id="wrapper">
    <?php
    $navigationActive = array(2, 2);

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
                                    "title"      => "Ubah Password Siswa",
                                    "breadcrumb" => array(
                                            array(
                                                    "title" => "Siswa",
                                                    "link"  => UtilsManager::generateRoute('siswa')
                                            ), array(
                                                    "title" => "Ubah Password Petugas",
                                                    "link"  => UtilsManager::generateRoute('siswa_ubah_password',
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
                                        $result = $databaseManager->read("siswa", "*", "nisn = '$id'",
                                                "AND dihapus = '0'");
                                        $result = $result->fetch_assoc();
                                        ?>

                                        <?php
                                        $inputs = [
                                                [
                                                        "type"      => "password",
                                                        'label'     => 'Password',
                                                        'name'      => 'password',
                                                        'value'     => $_POST['password'] ?? '',
                                                        'iconClass' => 'fas fa-lock',
                                                        'required'  => true,
                                                        'disabled'  => false,
                                                ],
                                                [
                                                        "type"      => "password",
                                                        'label'     => 'Konfirmasi Password',
                                                        'name'      => 'password_konfirmasi',
                                                        'value'     => $_POST['password_konfirmasi'] ?? '',
                                                        'iconClass' => 'fas fa-check-square',
                                                        'required'  => true,
                                                        'disabled'  => false,
                                                ],

                                        ];

                                        $inputFields = UtilsManager::generateInputFields($inputs);
                                        echo $inputFields;

                                        ?>


                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary btn-block">Ubah Password
                                                </button>
                                            </div>
                                            <div class="col-4">
                                                <a href="<?php
                                                echo generateUrl('siswa'); ?>"
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
    $password = UtilsManager::getPostQuery('password');
    $password_konfirmasi = UtilsManager::getPostQuery('password_konfirmasi');

    if ($password != $password_konfirmasi) {
        echo "<script>errorModal('Password tidak sama', null, 'card-container')</script>";
        return;
    }

    $password = password_hash($password, PASSWORD_ARGON2I);

    try {
        $set = "password = '$password'";
        $result = $databaseManager->update("siswa", $set, "nisn = '$id'");

        if ($result) {
            echo "<script>successModal('Sukses', 'index.php', 'card-container')</script>";
        } else {
            echo "<script>errorModal('Gagal', null, 'card-container')</script>";
        }
    } catch (Exception $e) {
        $error = str_replace("'", "", $e->getMessage());
        echo "<script>errorModal('$error', null, 'card-container')</script>";
    }
}
?>

</body>
</html>


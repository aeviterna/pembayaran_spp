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
    $headTitle = "Hapus Kelas";

    require_once(dirname(__FILE__, 4)."/components/_head.php");
    require_once(dirname(__FILE__, 4)."/components/_modal.php");
    require_once(dirname(__FILE__, 4)."/components/_dataTableHead.php");
    ?>
</head>
<body class="hold-transition layout-navbar-fixed layout-fixed light-mode" id="body-theme">
<div class="wrapper" id="wrapper">
    <?php
    $navigationActive = array(2, 3);

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
                                    "title"      => "Ubah Kelas",
                                    "breadcrumb" => array(
                                            array(
                                                    "title" => "Kelas",
                                                    "link"  => UtilsManager::generateRoute('kelas')
                                            ), array(
                                                    "title" => "Hapus Kelas",
                                                    "link"  => UtilsManager::generateRoute('kelas_hapus',
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
                                        $result = $databaseManager->read("kelas", "*", "id_kelas = '$id'",
                                                "AND dihapus = '0'");
                                        $result = $result->fetch_assoc();
                                        ?>

                                        <?php
                                        $inputs = [
                                                [
                                                        "type"      => "text",
                                                        'label'     => 'Nama Kelas',
                                                        'name'      => 'nama_kelas',
                                                        'value'     => $result['nama_kelas'] ?? $_POST['nama_kelas'],
                                                        'iconClass' => 'fas fa-user-graduate',
                                                        'required'  => true,
                                                        'disabled'  => true,
                                                ],
                                                [
                                                        "type"      => "text",
                                                        'label'     => 'Kompetensi Keahlian',
                                                        'name'      => 'kompetensi_keahlian',
                                                        'value'     => $result['kompetensi_keahlian'] ?? $_POST['kompetensi_keahlian'],
                                                        'iconClass' => 'fas fa-code-branch',
                                                        'required'  => true,
                                                        'disabled'  => true,
                                                ],
                                        ];

                                        $inputFields = UtilsManager::generateInputFields($inputs);
                                        echo $inputFields;

                                        ?>


                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary btn-block">Hapus
                                                </button>
                                            </div>
                                            <div class="col-4">
                                                <a href="<?php
                                                echo UtilsManager::generateRoute('kelas'); ?>"
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
    try {
        $set = "dihapus = '1'";
        $result = $databaseManager->update("kelas", $set, "id_kelas = '$id'");

        if ($result) {
            echo "<script>successModal('Sukses', 'index.php', 'card-container')</script>";
        } else {
            echo "<script>errorModal('Gagal', null, 'card-container')</script>";
        }
    } catch (Exception $e) {
        $error = str_replace("'", "", $e->getMessage());
        echo $error;
        echo "<script>errorModal('$error', null, 'card-container')</script>";
    }

}
?>

</body>
</html>


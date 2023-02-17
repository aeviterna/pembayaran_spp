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
    $headTitle = "Tambah SPP";

    require_once(dirname(__FILE__, 4)."/components/_head.php");
    require_once(dirname(__FILE__, 4)."/components/_modal.php");
    require_once(dirname(__FILE__, 4)."/components/_dataTableHead.php");
    ?>
</head>
<body class="hold-transition layout-navbar-fixed layout-fixed light-mode" id="body-theme">
<div class="wrapper" id="wrapper">
    <?php
    $navigationActive = array(2, 4);

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
                                    "title"      => "Tambah SPP",
                                    "breadcrumb" => array(
                                            array(
                                                    "title" => "SPP",
                                                    "link"  => UtilsManager::generateRoute('spp')
                                            ), array(
                                                    "title" => "Tambah SPP",
                                                    "link"  => UtilsManager::generateRoute('spp_tambah')
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
                                        $inputs = [
                                                [
                                                        "type"      => "number",
                                                        'label'     => 'Tahun Ajaran',
                                                        'name'      => 'tahun',
                                                        'value'     => $_POST['tahun'] ?? '',
                                                        'iconClass' => 'fas fa-user-graduate',
                                                        'required'  => true,
                                                        'disabled'  => false,
                                                ],
                                                [
                                                        "type"      => "number",
                                                        'label'     => 'Nominal SPP',
                                                        'name'      => 'nominal',
                                                        'value'     => $_POST['nominal'] ?? '',
                                                        'iconClass' => 'fas fa-code-branch',
                                                        'required'  => true,
                                                        'disabled'  => false,
                                                ],
                                        ];

                                        $inputFields = UtilsManager::generateInputFields($inputs);
                                        echo $inputFields;

                                        ?>


                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary btn-block">Ubah
                                                </button>
                                            </div>
                                            <div class="col-4">
                                                <a href="<?php
                                                echo UtilsManager::generateRoute('spp'); ?>"
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
    $tahun = UtilsManager::getPostQuery('tahun');
    $nominal = UtilsManager::getPostQuery('nominal');

    $result = $databaseManager->read("spp", "id_spp", "tahun = '$tahun' AND nominal = '$nominal' AND dihapus = '0'");
    if ($result->num_rows > 0) {
        echo "<script>errorModal('Nominal sudah ada', null, 'card-container')</script>";
        exit();
    }

    try {
        $query = "'$tahun', '$nominal'";
        $result = $databaseManager->create("spp", 'tahun, nominal', $query);

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


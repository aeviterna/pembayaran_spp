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
    $headTitle = "Hapus Siswa";

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
                                    "title"      => "Hapus Siswa",
                                    "breadcrumb" => array(
                                            array(
                                                    "title" => "Siswa",
                                                    "link"  => UtilsManager::generateRoute('siswa')
                                            ), array(
                                                    "title" => "Hapus Petugas",
                                                    "link"  => UtilsManager::generateRoute('siswa_hapus',
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

                                        $allKelas = $databaseManager->read("kelas", "*", "dihapus='0'");
                                        $allKelas = $allKelas->fetch_all(MYSQLI_ASSOC);

                                        $allSpp = $databaseManager->read("spp", "*", "dihapus='0'");
                                        $allSpp = $allSpp->fetch_all(MYSQLI_ASSOC);

                                        $all_kelas = array();
                                        $all_spp = array();

                                        foreach ($allKelas as $kelas) {
                                            $all_kelas[$kelas['id_kelas']] = $kelas['nama_kelas']." ".$kelas['kompetensi_keahlian'];
                                        }

                                        foreach ($allSpp as $spp) {
                                            $all_spp[$spp['id_spp']] = $spp['tahun']." - Rp. ".number_format($spp['nominal'],
                                                            0, ',', '.');
                                        }
                                        ?>

                                        <?php
                                        $inputs = [
                                                [
                                                        "type"      => "number",
                                                        'label'     => 'NISN',
                                                        'name'      => 'nisn',
                                                        'value'     => $result['nisn'] ?? $_POST['nisn'],
                                                        'iconClass' => 'fas fa-id-card',
                                                        'required'  => true,
                                                        'disabled'  => true,
                                                ],
                                                [
                                                        "type"      => "number",
                                                        'label'     => 'NIS',
                                                        'name'      => 'nis',
                                                        'value'     => $result['nis'] ?? $_POST['nis'],
                                                        'iconClass' => 'fas fa-address-card',
                                                        'required'  => true,
                                                        'disabled'  => true,
                                                ],
                                                [
                                                        "type"      => "text",
                                                        'label'     => 'Nama',
                                                        'name'      => 'nama',
                                                        'value'     => $result['nama'] ?? $_POST['nama'],
                                                        'iconClass' => 'fas fa-user',
                                                        'required'  => true,
                                                        'disabled'  => true,
                                                ],
                                                [
                                                        "type"      => "text",
                                                        'label'     => 'Alamat',
                                                        'name'      => 'alamat',
                                                        'value'     => $result['alamat'] ?? $_POST['alamat'],
                                                        'iconClass' => 'fas fa-home',
                                                        'required'  => true,
                                                        'disabled'  => true,
                                                ],
                                                [
                                                        "type"      => "number",
                                                        'label'     => 'No Telpon',
                                                        'name'      => 'no_telp',
                                                        'value'     => $result['no_telp'] ?? $_POST['no_telp'],
                                                        'iconClass' => 'fas fa-phone',
                                                        'required'  => true,
                                                        'disabled'  => true,
                                                ],
                                                [
                                                        "type"      => "select",
                                                        "label"     => "Kelas",
                                                        "name"      => "id_kelas",
                                                        "options"   => $all_kelas,
                                                        "value"     => strval($result['id_kelas']),
                                                        "iconClass" => "fas fa-chalkboard-teacher",
                                                        "required"  => true,
                                                        "disabled"  => true
                                                ],
                                                [
                                                        "type"      => "select",
                                                        "label"     => "SPP",
                                                        "name"      => "id_spp",
                                                        "options"   => $all_spp,
                                                        "value"     => strval($result['id_spp']),
                                                        "iconClass" => "fas fa-money-check-alt",
                                                        "required"  => true,
                                                        "disabled"  => true
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
    try {
        $set = "dihapus = '1'";
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


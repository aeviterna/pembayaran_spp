<?php

require_once(dirname(__FILE__, 4)."/managers/_databaseManager.php");
require_once(dirname(__FILE__, 4)."/managers/_authenticationManager.php");
require_once(dirname(__FILE__, 4)."/managers/_sessionManager.php");
require_once(dirname(__FILE__, 4)."/managers/_roleManager.php");
require_once(dirname(__FILE__, 4)."/managers/_utilsManager.php");
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

                                        <?php

                                        $allKelas = $databaseManager->read("kelas", "*", "dihapus='0'");
                                        $allKelas = $allKelas->fetch_all(MYSQLI_ASSOC);

                                        $allSpp = $databaseManager->read("spp", "*", "dihapus='0'");
                                        $allSpp = $allSpp->fetch_all(MYSQLI_ASSOC);

                                        $all_kelas = array(
                                                '00' => 'Pilih Kelas'
                                        );
                                        $all_spp = array(
                                                '00' => 'Pilih SPP'
                                        );

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
                                                        'value'     => $_POST['nisn'] ?? '',
                                                        'iconClass' => 'fas fa-id-card',
                                                        'required'  => true,
                                                        'disabled'  => false,
                                                ],
                                                [
                                                        "type"      => "number",
                                                        'label'     => 'NIS',
                                                        'name'      => 'nis',
                                                        'value'     => $_POST['nis'] ?? '',
                                                        'iconClass' => 'fas fa-address-card',
                                                        'required'  => true,
                                                        'disabled'  => false,
                                                ],
                                                [
                                                        "type"      => "password",
                                                        'label'     => 'Password',
                                                        'name'      => 'password',
                                                        'value'     => $_POST['password'] ?? '',
                                                        'iconClass' => 'fas fa-address-card',
                                                        'required'  => true,
                                                        'disabled'  => false,
                                                ],
                                                [
                                                        "type"      => "text",
                                                        'label'     => 'Nama',
                                                        'name'      => 'nama',
                                                        'value'     => $_POST['nama'] ?? '',
                                                        'iconClass' => 'fas fa-user',
                                                        'required'  => true,
                                                        'disabled'  => false,
                                                ],
                                                [
                                                        "type"      => "text",
                                                        'label'     => 'Alamat',
                                                        'name'      => 'alamat',
                                                        'value'     => $_POST['alamat'] ?? '',
                                                        'iconClass' => 'fas fa-home',
                                                        'required'  => true,
                                                        'disabled'  => false,
                                                ],
                                                [
                                                        "type"      => "number",
                                                        'label'     => 'No Telpon',
                                                        'name'      => 'no_telp',
                                                        'value'     => $_POST['no_telp'] ?? '',
                                                        'iconClass' => 'fas fa-phone',
                                                        'required'  => true,
                                                        'disabled'  => false,
                                                ],
                                                [
                                                        "type"      => "select",
                                                        "label"     => "Kelas",
                                                        "name"      => "id_kelas",
                                                        "options"   => $all_kelas,
                                                        "value"     => strval(00),
                                                        "iconClass" => "fas fa-chalkboard-teacher",
                                                        "required"  => true,
                                                        "disabled"  => false
                                                ],
                                                [
                                                        "type"      => "select",
                                                        "label"     => "SPP",
                                                        "name"      => "id_spp",
                                                        "options"   => $all_spp,
                                                        "value"     => strval(00),
                                                        "iconClass" => "fas fa-money-check-alt",
                                                        "required"  => true,
                                                        "disabled"  => false
                                                ],

                                        ];

                                        $inputFields = UtilsManager::generateInputFields($inputs);
                                        echo $inputFields;


                                        ?>


                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary btn-block">Buat
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
    $nisn = $_POST['nisn'] ?? null;
    $nis = $_POST['nis'] ?? null;
    $nama = $_POST['nama'] ?? null;
    $password = $_POST['password'] ?? null;
    $alamat = $_POST['alamat'] ?? null;
    $no_telp = $_POST['no_telp'] ?? null;
    $id_kelas = $_POST['id_kelas'] ?? null;
    $id_spp = $_POST['id_spp'] ?? null;
    $id_level = RoleEnumeration::SISWA;

    $payload = new RegisterSiswaDataDefinition(
            $nama,
            $nisn,
            $password,
            $nis,
            $id_kelas,
            $alamat,
            $no_telp,
            $id_spp,
            $id_level
    );

    try {
        $authenticationManager = new AuthenticationManager();
        $result = $authenticationManager->registerSiswa($payload);

        $response = json_decode($result, true);
        $status = $response['status'];
        $message = $response['message'];

        if ($status === "success") {
            echo "<script>successModal('$message', 'index.php', 'card-container')</script>";
        } else {
            echo "<script>errorModal('$message', null, 'card-container')</script>";
        }

    } catch (Exception $e) {
        $error = str_replace("'", "", $e->getMessage());
        echo "<script>errorModal('$error', null, 'card-container')</script>";
    }

}
?>

</body>
</html>


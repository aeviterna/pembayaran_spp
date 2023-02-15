<?php

require_once(dirname(__FILE__, 4)."/managers/_databaseManager.php");
require_once(dirname(__FILE__, 4)."/managers/_sessionManager.php");
require_once(dirname(__FILE__, 4)."/managers/_roleManager.php");
require_once(dirname(__FILE__, 4)."/managers/_utilsManager.php");

require_once(dirname(__FILE__, 4)."/utilities/_functions.php");

SessionManager::startSession();
UtilsManager::isLoggedIn();
UtilsManager::isAccountActivated();

$databaseManager = new DatabaseManager();
$roleManager = new RoleManager(SessionManager::get('role'));
UtilsManager::isAdministratorOrAbove($roleManager);

if (UtilsManager::getQueryQuery('nisn')) {
    $nisn = UtilsManager::getQueryQuery('nisn');
    $nisn = openssl_decrypt($nisn, 'AES-128-ECB', Configuration::OPENSSL_ENCRYPTION_KEY);
}

$pageItemObject = [
        'title'      => 'Tambah Transaksi',
        'breadcrumb' => [
                [
                        'title' => 'Pembayaran',
                        'link'  => UtilsManager::generateRoute('pembayaran_transaksi')
                ],
                [
                        'title' => 'Tambah Transaksi',
                        'link'  => UtilsManager::generateRoute('pembayaran_transaksi_tambah', ['nisn' => $nisn])
                ],
        ]
];
?>

<!doctype html>
<html lang="en">
<head>
    <?php
    $headTitle = "Tambah Transaksi";

    require_once(dirname(__FILE__, 4)."/components/_head.php");
    require_once(dirname(__FILE__, 4)."/components/_dataTableHead.php");
    require_once(dirname(__FILE__, 4)."/components/_modal.php");
    ?>

    <style>
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>
</head>
<body class="hold-transition layout-navbar-fixed layout-fixed light-mode" id="body-theme">
<div class="wrapper">
    <?php
    include_once(dirname(__FILE__, 4)."/components/_navigation.php");
    ?>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm">
                        <div class="card p-2">
                            <?php
                            require_once(dirname(__FILE__, 4)."/components/_contentHead.php");
                            ?>
                            <div id="card-container" class="card-body">
                                <form class="row mb-2"
                                      method="post"
                                      onsubmit="return confirmModal('form', this, 'card-container');"
                                      action="<?php
                                      echo $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']; ?>"
                                >
                                    <div class="col-sm">
                                        <?php
                                        $siswa = $databaseManager->read("siswa", "*", "nisn = '$nisn'");
                                        $siswa = $siswa->fetch_assoc();

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

                                        $inputs = [
                                                [
                                                        "type"      => "text",
                                                        'label'     => 'NISN',
                                                        'name'      => 'nisn',
                                                        'value'     => $_POST['nisn'] ?? $siswa['nisn'],
                                                        'iconClass' => 'fas fa-id-card',
                                                        'required'  => true,
                                                        'disabled'  => true,
                                                ],
                                                [
                                                        "type"      => "select",
                                                        "label"     => "Kelas",
                                                        "name"      => "id_kelas",
                                                        "options"   => $all_kelas,
                                                        "value"     => strval($siswa['id_kelas']),
                                                        "iconClass" => "fas fa-chalkboard-teacher",
                                                        "required"  => true,
                                                        "disabled"  => false
                                                ],
                                                [
                                                        "type"      => "select",
                                                        "label"     => "SPP",
                                                        "name"      => "id_spp",
                                                        "options"   => $all_spp,
                                                        "value"     => strval($siswa['id_spp']),
                                                        "iconClass" => "fas fa-money-bill-wave",
                                                        "required"  => true,
                                                        "disabled"  => false
                                                ],
                                                [
                                                        "type"      => "number",
                                                        'label'     => 'Jumlah Bayar',
                                                        'name'      => 'jumlah_bayar',
                                                        'value'     => $_POST['jumlah_bayar'] ?? '',
                                                        'iconClass' => 'fas fa-money-bill',
                                                        'required'  => true,
                                                        'disabled'  => false,
                                                ],
                                                [
                                                        "type"      => "date",
                                                        'label'     => 'Tanggal Dibayar (mm/dd/yyyy)',
                                                        'name'      => 'tgl_bayar',
                                                        'value'     => $_POST['tgl_bayar'] ?? '',
                                                        'iconClass' => 'fas fa-calendar-alt',
                                                        'required'  => true,
                                                        'disabled'  => false,
                                                ],
                                        ];

                                        $inputFields = UtilsManager::generateInputFields($inputs);
                                        echo $inputFields;
                                        ?>

                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary btn-block">Bayar
                                                </button>
                                            </div>
                                            <div class="col-4">
                                                <a href="<?php
                                                echo UtilsManager::generateRoute('pembayaran_transaksi'); ?>"
                                                   class="btn btn-warning btn-block"
                                                >Kembali
                                                </a>
                                            </div>
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
    $id_kelas = UtilsManager::getPostQuery('id_kelas');
    $id_spp = UtilsManager::getPostQuery('id_spp');
    $jumlah_bayar = UtilsManager::getPostQuery('jumlah_bayar');
    $tanggal_bayar = UtilsManager::getPostQuery('tgl_bayar');

    $phpDate = date('Y-m-d', strtotime($tanggal_bayar));
    $tahun = date('Y', strtotime($phpDate));
    $bulan = date('m', strtotime($phpDate));
    $hari = date('d', strtotime($phpDate));

    $spp = $databaseManager->read("spp", "*", "id_spp = '$id_spp'");
    $spp = $spp->fetch_assoc();

    $isPaid = $databaseManager->read("pembayaran", "*",
            "nisn = '$nisn' AND bulan_dibayar = '$bulan' AND tahun_dibayar = '$tahun'");

    if ($isPaid->num_rows > 0) {
        echo "<script>errorModal('Maaf, SPP untuk bulan dan tahun tersebut sudah dibayarkan.', null, 'card-container')</script>";
        exit();
    }

    if (intval($jumlah_bayar) < intval($spp['nominal'])) {
        echo "<script>errorModal('Maaf, jumlah bayar SPP dari siswa kurang dari nominal SPP yang seharusnya dibayarkan.', null, 'card-container')</script>";
        exit();
    }

    try {
        $payload = [
                'id_petugas'    => SessionManager::get('id'),
                'nisn'          => $nisn,
                'tgl_bayar'     => $phpDate,
                'bulan_dibayar' => $bulan,
                'tahun_dibayar' => $tahun,
                'id_spp'        => $id_spp,
                'jumlah_bayar'  => $jumlah_bayar
        ];
        $result = $databaseManager->create("pembayaran",
                "id_petugas, nisn, tgl_bayar, bulan_dibayar, tahun_dibayar, id_spp, jumlah_bayar",
                "'$payload[id_petugas]', '$payload[nisn]', '$payload[tgl_bayar]', '$payload[bulan_dibayar]', '$payload[tahun_dibayar]', '$payload[id_spp]', '$payload[jumlah_bayar]'");

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

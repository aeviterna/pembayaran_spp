<?php

require_once(dirname(__FILE__, 4)."/managers/_databaseManager.php");
require_once(dirname(__FILE__, 4)."/managers/_sessionManager.php");
require_once(dirname(__FILE__, 4)."/managers/_roleManager.php");
require_once(dirname(__FILE__, 4)."/managers/_utilsManager.php");

require_once(dirname(__FILE__, 4)."/utilities/_configuration.php");
require_once(dirname(__FILE__, 4)."/utilities/_functions.php");

SessionManager::startSession();
UtilsManager::isLoggedIn();
UtilsManager::isAccountActivated();

$databaseManager = new DatabaseManager();
$roleManager = new RoleManager(SessionManager::get('role'));
UtilsManager::isAdministratorOrAbove($roleManager);

$id_pembayaran = UtilsManager::getQueryQuery('pembayaran');

$pageItemObject = [
        'title'      => 'Update Transaksi',
        'breadcrumb' => [
                [
                        'title' => 'Pembayaran',
                        'link'  => UtilsManager::generateRoute('pembayaran_transaksi')
                ],
                [
                        'title' => 'Update Transaksi',
                        'link'  => UtilsManager::generateRoute('pembayaran_transaksi_ubah',
                                ['pembayaran' => $id_pembayaran])
                ],
        ]
];
?>

<!doctype html>
<html lang="en">
<head>
    <?php
    $headTitle = "Update Transaksi";

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
                                        $allKelas = $databaseManager->read("kelas", "*", "dihapus='0'");
                                        $allKelas = $allKelas->fetch_all(MYSQLI_ASSOC);

                                        $allSpp = $databaseManager->read("spp", "*", "dihapus='0'");
                                        $allSpp = $allSpp->fetch_all(MYSQLI_ASSOC);

                                        $all_kelas = array();
                                        $all_spp = array();

                                        $pembayaran = $databaseManager->read("pembayaran", "*",
                                                "id_pembayaran = '$id_pembayaran'");
                                        $pembayaran = $pembayaran->fetch_assoc();

                                        $inputs = [
                                                [
                                                        "type"      => "date",
                                                        'label'     => 'Tanggal Dibayar (mm/dd/yyyy)',
                                                        'name'      => 'tgl_bayar',
                                                        'value'     => $pembayaran['tgl_bayar'] ?? $_POST['tgl_bayar'],
                                                        'iconClass' => 'fas fa-calendar-alt',
                                                        'required'  => true,
                                                        'disabled'  => false,
                                                ],
                                                [
                                                        "type"      => "number",
                                                        'label'     => 'Jumlah Bayar',
                                                        'name'      => 'jumlah_bayar',
                                                        'value'     => $pembayaran['jumlah_bayar'] ?? $_POST['jumlah_bayar'],
                                                        'iconClass' => 'fas fa-money-bill',
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
                                                echo UtilsManager::generateRoute('pembayaran_history_siswa', [
                                                        'nisn' => openssl_encrypt($pembayaran['nisn'],
                                                                "AES-128-ECB",
                                                                Configuration::OPENSSL_ENCRYPTION_KEY)
                                                ]); ?>"
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
//    $id_spp = UtilsManager::getPostQuery('id_spp');
//    $jumlah_bayar = UtilsManager::getPostQuery('jumlah_bayar');
//    $tanggal_bayar = UtilsManager::getPostQuery('tgl_bayar');
//
//    $phpDate = date('Y-m-d', strtotime($tanggal_bayar));
//    $tahun = date('Y', strtotime($phpDate));
//    $bulan = date('m', strtotime($phpDate));
//    $hari = date('d', strtotime($phpDate));
//
//    $sisa = 0;
//    $status = '0';
//
//    $spp = $databaseManager->read("spp", "*", "id_spp = '$id_spp'");
//    $spp = $spp->fetch_assoc();
//
//    $pembayaran = $databaseManager->read("pembayaran", "*",
//            "nisn = '$nisn' AND id_spp = '$id_spp' AND bulan_dibayar = '$bulan' AND tahun_dibayar = '$tahun'");
//    $pembayaran = $pembayaran->fetch_assoc();
//
//    if ($pembayaran) {
//        if ($pembayaran['sisa_pembayaran'] == 0) {
//            echo "<script>errorModal('Maaf, SPP dari siswa sudah lunas.', null, 'card-container')</script>";
//            exit();
//        }
//
//        if ($jumlah_bayar > $pembayaran['sisa_pembayaran']) {
//            echo "<script>errorModal('Maaf, jumlah bayar SPP dari siswa lebih dari nominal SPP yang seharusnya dibayarkan.', null, 'card-container')</script>";
//            exit();
//        } else {
//            if ($pembayaran['status'] == '1') {
//                echo "<script>errorModal('Maaf, SPP dari siswa sudah lunas.', null, 'card-container')</script>";
//                exit();
//            }
//
//            $sisa = $pembayaran['sisa_pembayaran'] - $jumlah_bayar;
//
//            try {
//                $jumlah_bayar = intval($pembayaran['jumlah_bayar']) + intval($jumlah_bayar);
//
//                if ($jumlah_bayar == $spp['nominal']) {
//                    $status = '1';
//                }
//
//                $set = "jumlah_bayar = '$jumlah_bayar', tgl_bayar = '$tanggal_bayar', sisa_pembayaran = '$sisa', status = '$status'";
//
//                $result = $databaseManager->update("pembayaran", $set, "id_pembayaran = '$pembayaran[id_pembayaran]'");
//
//                if ($result) {
//                    echo "<script>successModal('Sukses', 'index.php', 'card-container')</script>";
//                } else {
//                    echo "<script>errorModal('Gagal', null, 'card-container')</script>";
//                }
//                exit();
//
//            } catch (Exception $e) {
//                $error = str_replace("'", "", $e->getMessage());
//                echo "<script>errorModal('$error', null, 'card-container')</script>";
//                exit();
//            }
//        }
//    } else {
//        if ($jumlah_bayar > $spp['nominal']) {
//            echo "<script>errorModal('Maaf, jumlah bayar SPP dari siswa lebih dari nominal SPP yang seharusnya dibayarkan.', null, 'card-container')</script>";
//            exit();
//        }
//
//        if (intval($jumlah_bayar) < intval($spp['nominal'])) {
//            $sisa = intval($spp['nominal']) - intval($jumlah_bayar);
//        }
//
//        try {
//            if ($jumlah_bayar == $spp['nominal']) {
//                $status = '1';
//            }
//
//            $payload = [
//                    'id_petugas'      => SessionManager::get('id'),
//                    'nisn'            => $nisn,
//                    'tgl_bayar'       => $phpDate,
//                    'bulan_dibayar'   => $bulan,
//                    'tahun_dibayar'   => $tahun,
//                    'id_spp'          => $id_spp,
//                    'jumlah_bayar'    => $jumlah_bayar,
//                    'sisa_pembayaran' => $sisa,
//                    'status'          => $status
//            ];
//
//            $result = $databaseManager->create("pembayaran",
//                    "id_petugas, nisn, tgl_bayar, bulan_dibayar, tahun_dibayar, id_spp, jumlah_bayar, sisa_pembayaran, status",
//                    "'$payload[id_petugas]', '$payload[nisn]', '$payload[tgl_bayar]', '$payload[bulan_dibayar]', '$payload[tahun_dibayar]', '$payload[id_spp]', '$payload[jumlah_bayar]', '$payload[sisa_pembayaran]', '$payload[status]'");
//
//            if ($result) {
//                echo "<script>successModal('Sukses', 'index.php', 'card-container')</script>";
//            } else {
//                echo "<script>errorModal('Gagal', null, 'card-container')</script>";
//            }
//
//        } catch (Exception $e) {
//            $error = str_replace("'", "", $e->getMessage());
//            echo "<script>errorModal('2 $error', null, 'card-container')</script>";
//        }
//    }
}
?>
</body>
</html>


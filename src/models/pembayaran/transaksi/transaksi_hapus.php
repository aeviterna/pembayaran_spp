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
        'title'      => 'Hapus Transaksi',
        'breadcrumb' => [
                [
                        'title' => 'Pembayaran',
                        'link'  => UtilsManager::generateRoute('pembayaran_transaksi')
                ],
                [
                        'title' => 'Hapus Transaksi',
                        'link'  => UtilsManager::generateRoute('pembayaran_transaksi_hapus',
                                ['pembayaran' => $id_pembayaran])
                ],
        ]
];
?>

<!doctype html>
<html lang="en">
<head>
    <?php
    $headTitle = "Hapus Transaksi";

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

                                        $spp = $databaseManager->read('spp', '*',
                                                "id_spp = '".$pembayaran['id_spp']."'");
                                        $spp = $spp->fetch_assoc();

                                        $nominal = number_format($spp['nominal'], 0, ',', '.');
                                        $jumlah = number_format($pembayaran['jumlah_bayar'], 0, ',', '.');

                                        $inputs = [
                                                [
                                                        "type"      => "date",
                                                        'label'     => 'Tanggal Dibayar (mm/dd/yyyy)',
                                                        'name'      => 'tgl_bayar',
                                                        'value'     => $pembayaran['tgl_bayar'] ?? $_POST['tgl_bayar'],
                                                        'iconClass' => 'fas fa-calendar-alt',
                                                        'required'  => true,
                                                        'disabled'  => true,
                                                ],
                                                [
                                                        "type"      => "text",
                                                        'label'     => 'Jumlah Bayar',
                                                        'name'      => 'nominal',
                                                        'value'     => "Rp ".$nominal ?? $_POST['jumlah_bayar'],
                                                        'iconClass' => 'fas fa-money-bill',
                                                        'required'  => true,
                                                        'disabled'  => true,
                                                ],
                                                [
                                                        "type"      => "text",
                                                        'label'     => 'Jumlah Bayar',
                                                        'name'      => 'jumlah_bayar',
                                                        'value'     => "Rp ".$jumlah ?? $_POST['jumlah_bayar'],
                                                        'iconClass' => 'fas fa-money-bill',
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
    try {
        $set = "dihapus = '1'";
        $result = $databaseManager->update("pembayaran", $set, "id_pembayaran = '$id_pembayaran'");

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


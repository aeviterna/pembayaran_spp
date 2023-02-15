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
UtilsManager::isSiswaAccessingOwnData(SessionManager::get('nisn'));

$pageItemObject = [
        'title'      => 'History Pembayaran',
        'breadcrumb' => [
                [
                        'title' => 'Pembayaran',
                        'link'  => UtilsManager::generateRoute('pembayaran_transaksi')
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
                                <div class="col-sm">
                                    <table id="main-table" class="table table-bordered table-stripped table-sm">
                                        <thead>
                                        <tr>
                                            <th class="text-center align-middle export">NISN</th>
                                            <th class="text-center align-middle export">NIS</th>
                                            <th class="text-center align-middle export">Nama</th>
                                            <th class="text-center align-middle export">Kelas</th>
                                            <th class="text-center align-middle export">No Telpon</th>
                                            <th class="text-center align-middle export">Alamat</th>
                                            <th class="text-center align-middle export">Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $siswa_all = $databaseManager->read("siswa", "*", "dihapus = '0'");
                                        $siswa_all = $siswa_all->fetch_all(MYSQLI_ASSOC);

                                        foreach ($siswa_all as $siswa) {
                                            $kelas = $databaseManager->read("kelas", "*",
                                                    "id_kelas = '".$siswa['id_kelas']."'")->fetch_assoc();

                                            ?>
                                            <tr>
                                                <td class="text-center align-middle export"><?= $siswa['nisn'] ?></td>
                                                <td class="text-center align-middle export"><?= $siswa['nis'] ?></td>
                                                <td class="text-center align-middle export"><?= $siswa['nama'] ?></td>
                                                <td class="text-center align-middle export"><?= $kelas['nama_kelas']." ".$kelas['kompetensi_keahlian'] ?></td>
                                                <td class="text-center align-middle export"><?= $siswa['no_telp'] ?></td>
                                                <td class="text-center align-middle export"><?= $siswa['alamat'] ?></td>
                                                <td class="text-center align-middle export">
                                                    <div class="btn-group">
                                                        <a class="btn btn-app bg-info m-0"
                                                           href="<?php
                                                           echo UtilsManager::generateRoute('pembayaran_history_siswa',
                                                                   [
                                                                           'nisn' => openssl_encrypt($siswa['nisn'],
                                                                                   "AES-128-ECB",
                                                                                   Configuration::OPENSSL_ENCRYPTION_KEY)
                                                                   ])
                                                           ?>"
                                                        >
                                                            <i class="fas fa-calendar"></i> Riwayat
                                                        </a>
                                                    </div>
                                                </td>

                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
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
</body>
</html>

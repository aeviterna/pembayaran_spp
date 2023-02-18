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

if (UtilsManager::getQueryQuery('nisn')) {
    $nisn = UtilsManager::getQueryQuery('nisn');
    $nisn = openssl_decrypt($nisn, 'AES-128-ECB', Configuration::OPENSSL_ENCRYPTION_KEY);
} else {
    $nisn = SessionManager::get('nisn');
}

UtilsManager::isSiswaValidation($nisn);
$siswa = $databaseManager->read('siswa', '*', "nisn = '$nisn'");
$siswa = $siswa->fetch_assoc();

$pageItemObject = [
        'title'       => 'History Pembayaran Siswa',
        'description' => 'Menampilkan riwayat pembayaran untuk '.$siswa['nama'],
        'breadcrumb'  => [
                [
                        'title' => 'Pembayaran',
                        'link'  => UtilsManager::generateRoute('pembayaran_transaksi')
                ],
        ]
];

$indonesian_month_names = array(
        'January'   => 'Januari',
        'February'  => 'Februari',
        'March'     => 'Maret',
        'April'     => 'April',
        'May'       => 'Mei',
        'June'      => 'Juni',
        'July'      => 'Juli',
        'August'    => 'Agustus',
        'September' => 'September',
        'October'   => 'Oktober',
        'November'  => 'November',
        'December'  => 'Desember',
);

$indonesian_month_names_with_numerals = array(
        '00' => 'Semua Bulan',
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
);

$query = $databaseManager->query("SELECT YEAR(MIN(dibuat)) AS min_year, YEAR(MAX(dibuat)) AS max_year FROM pwpb_spp.petugas");
$query = $query->fetch_assoc();

$years = [
        0 => 'Semua Tahun',
];
foreach (range($query['min_year'], $query['max_year']) as $year) {
    $years[$year] = $year;
}


?>

<!doctype html>
<html lang="en">
<head>
    <?php
    $headTitle = "Riwayat Transaksi";

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
                                <div class="row-mb-2">
                                    <form class="row mb-2" action="<?php
                                    echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                        <div class="col-sm">
                                            <?php
                                            $inputs = [
                                                    [
                                                            "type"      => "select",
                                                            "label"     => "",
                                                            "name"      => "tahun",
                                                            "options"   => $years,
                                                            "value"     => $_POST['tahun'] ?? date('Y'),
                                                            "iconClass" => "fas fa-calendar",
                                                            "required"  => true,
                                                            "disabled"  => false
                                                    ],
                                            ];
                                            $inputFields = UtilsManager::generateInputFields($inputs);
                                            echo $inputFields;
                                            ?>
                                        </div>
                                        <div class="col-sm">
                                            <?php
                                            $inputs = [
                                                    [
                                                            "type"      => "select",
                                                            "label"     => "",
                                                            "name"      => "bulan",
                                                            "options"   => $indonesian_month_names_with_numerals,
                                                            "value"     => $_POST['bulan'] ?? '00',
                                                            "iconClass" => "fas fa-calendar-alt",
                                                            "required"  => true,
                                                            "disabled"  => false
                                                    ],
                                            ];
                                            $inputFields = UtilsManager::generateInputFields($inputs);
                                            echo $inputFields;
                                            ?>
                                        </div>
                                        <div class="col-sm">
                                            <button class="btn btn-primary btn-block" type="submit"><i
                                                        class="fa fa-search"></i> Cari
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm">
                                    <table id="main-table" class="table table-bordered table-stripped table-sm">
                                        <thead>
                                        <tr>
                                            <th class="text-center align-middle export">Tanggal Pembayaran</th>
                                            <th class="text-center align-middle export">Tanggal SPP</th>
                                            <th class="text-center align-middle export">Nominal Pembayaran</th>
                                            <th class="text-center align-middle export">Jumlah Dibayar</th>
                                            <th class="text-center align-middle export">Sisa Pembayaran</th>
                                            <th class="text-center align-middle export">Status</th>
                                            <th class="text-center align-middle export">Aksi</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $currentDate = date("Y-m-d H:i:s");

                                        $extraFilter = "";
                                        if (isset($_POST["tahun"])) {
                                            $tahunFilter = $_POST["tahun"];
                                            if ($tahunFilter != 0) {
                                                $extraFilter = $extraFilter." AND YEAR(dibuat)='$tahunFilter'";
                                            }
                                        }

                                        if (isset($_POST["bulan"])) {
                                            $bulanFilter = $_POST["bulan"];
                                            if ($bulanFilter != 0) {
                                                $extraFilter = $extraFilter." AND MONTH(dibuat)='$bulanFilter'";
                                            }
                                        }

                                        $pembayaran = $databaseManager->read('pembayaran', '*', "nisn = '$nisn'",
                                                "$extraFilter");
                                        $pembayaran = $pembayaran->fetch_all(MYSQLI_ASSOC);

                                        foreach ($pembayaran as $item) {
                                            $spp = $databaseManager->read('spp', '*', "id_spp = '".$item['id_spp']."'");
                                            $spp = $spp->fetch_assoc();

                                            $tahun_spp = $spp['tahun'];

                                            $tanggal = date('d F Y', strtotime($item['tgl_bayar']));
                                            $tanggal = str_replace(array_keys($indonesian_month_names),
                                                    array_values($indonesian_month_names), $tanggal);
                                            $tahun = date('Y', strtotime($item['tgl_bayar']));
                                            $bulan = date('F', strtotime($item['tgl_bayar']));
                                            $bulan = $indonesian_month_names[$bulan];
                                            $nominal = number_format($spp['nominal'], 0, ',', '.');
                                            $jumlah = number_format($item['jumlah_bayar'], 0, ',', '.');
                                            $sisa = number_format($item['sisa_pembayaran'], 0, ',', '.');
                                            $status = $item['status'];
                                            $status_badge = "";

                                            if ($status == 1) {
                                                $status_badge = '<span class="badge badge-success">Lunas</span>';
                                            } else {
                                                $status_badge = '<span class="badge badge-danger">Tidak Lunas</span>';
                                            }

                                            $actions = "-";

                                            if ($roleManager->checkMinimumRole(RoleEnumeration::ADMINISTRATOR)) {
                                                $actions = "
                                                    <a href='".UtilsManager::generateRoute('pembayaran_transaksi_ubah',
                                                                [
                                                                        'pembayaran' => $item['id_pembayaran'],
                                                                ])."' class='btn btn-warning'><i class='fa fa-edit'></i></a>
                                                    <a href='".UtilsManager::generateRoute('pembayaran_transaksi_hapus',
                                                                [
                                                                        'pembayaran' => $item['id_pembayaran'],
                                                                ])."' class='btn btn-danger'><i class='fa fa-trash'></i></a>
                                                ";
                                            }
                                            echo "
                                                <tr>
                                                    <td class='text-center align-middle'>$tanggal</td>
                                                    <td class='text-center align-middle'>$tahun_spp</td>
                                                    <td class='text-center align-middle'>Rp. $nominal</td>
                                                    <td class='text-center align-middle'>Rp. $jumlah</td>
                                                    <td class='text-center align-middle'>Rp. $sisa</td>
                                                    <td class='text-center align-middle'>$status_badge</td>
                                                    <td class='text-center align-middle'>$actions</td>
                                                </tr>
                                            ";
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm">
                                    <div class="mt-4">
                                        <?php
                                        if ($roleManager->checkSingleRole(RoleEnumeration::ADMINISTRATOR)) {
                                            ?>
                                            <a href="<?php
                                            echo UtilsManager::generateRoute('pembayaran_history') ?>"
                                               class="btn btn-secondary"><i
                                                        class="fa fa-arrow-left"></i> Kembali</a>
                                            <?php
                                        }
                                        ?>
                                    </div>
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

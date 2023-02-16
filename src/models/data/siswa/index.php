<?php

require_once(dirname(__FILE__, 4)."/managers/_databaseManager.php");
require_once(dirname(__FILE__, 4)."/managers/_sessionManager.php");
require_once(dirname(__FILE__, 4)."/managers/_roleManager.php");
require_once(dirname(__FILE__, 4)."/managers/_utilsManager.php");
require_once(dirname(__FILE__, 4)."/utilities/_functions.php");
require_once(dirname(__FILE__, 4)."/utilities/_enumeration.php");

SessionManager::startSession();
UtilsManager::isLoggedIn();
UtilsManager::isAccountActivated();

$roleManager = new RoleManager(SessionManager::get("role"));

if (!$roleManager->checkMinimumRole(RoleEnumeration::ADMINISTRATOR)) {
    locationRedirect(generateUrl('home'));
}

$databaseManager = new DatabaseManager();

$result = $databaseManager->read("siswa", "*", "dihapus='0'",
        "ORDER BY nama ASC");
$result = $result->fetch_all(MYSQLI_ASSOC);

$result_count = $databaseManager->read("siswa", "COUNT(nisn) AS total_siswa", "dihapus='0'");

?>

<!doctype html>
<html lang="en">
<head>
    <?php
    $headTitle = "Siswa";

    require_once(dirname(__FILE__, 4)."/components/_head.php");
    require_once(dirname(__FILE__, 4)."/components/_dataTableHead.php");
    require_once(dirname(__FILE__, 4)."/components/_modal.php");
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
                <?php
                $cardArray = [
                        [
                                "id"    => 1,
                                "child" => [
                                        [
                                                "id"    => 1,
                                                "title" => "Total Siswa",
                                                "value" => $result_count->fetch_assoc()['total_siswa'],
                                                "icon"  => "graduation-cap"
                                        ]
                                ]
                        ]
                ];
                require_once(dirname(__FILE__, 4)."/components/_card.php");
                ?>
                <div class="row">
                    <div class="col-sm">
                        <div class="card p-2">
                            <?php
                            $pageItemObject = array(
                                    "title"      => "Siswa",
                                    "breadcrumb" => array(
                                            array(
                                                    "title" => "Siswa",
                                                    "link"  => generateUrl('siswa')
                                            ),
                                    )
                            );
                            require_once(dirname(__FILE__, 4)."/components/_contentHead.php");
                            ?>

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm">
                                        <table id="main-table" class="table table-bordered table-stripped table-sm">
                                            <thead>
                                            <tr>
                                                <!--                                                <th class="text-center align-middle export">No.</th>-->
                                                <th class="text-center align-middle export">NISN</th>
                                                <th class="text-center align-middle export">NIS</th>
                                                <th class="text-center align-middle export">Nama</th>
                                                <th class="text-center align-middle export">Kelas</th>
                                                <th class="text-center align-middle export">Alamat</th>
                                                <th class="text-center align-middle export">No Telpon</th>
                                                <th class="text-center align-middle">Aksi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            try {
                                            $i = 1;
                                            foreach ($result

                                            as $row) {
                                            $nisn = $row['nisn'];
                                            $nis = $row['nis'];
                                            $nama = $row['nama'];
                                            $alamat = $row['alamat'];
                                            $no_telpon = $row['no_telp'];

                                            $kelas_result = $databaseManager->read("kelas", "*",
                                                    "id_kelas='".$row['id_kelas']."'");
                                            $kelas_result = $kelas_result->fetch_assoc();
                                            $kelas = $kelas_result['nama_kelas'];
                                            $kompetensi_keahlian = $kelas_result['kompetensi_keahlian'];
                                            ?>
                                            <tr>
                                                <td class='text-center align-middle'><?php
                                                    echo $nisn; ?></td>
                                                <td class='text-center align-middle'><?php
                                                    echo $nis; ?></td>
                                                <td class='text-center align-middle'><?php
                                                    echo $nama; ?></td>
                                                <td class='text-center align-middle'><?php
                                                    echo $kelas." ".$kompetensi_keahlian; ?></td>
                                                <td class='text-center align-middle'><?php
                                                    echo $alamat ?></td>
                                                <td class='text-center align-middle'><?php
                                                    echo $no_telpon; ?></td>
                                                <td class='text-center align-middle'>
                                                    <div class="btn-group">
                                                        <a class="btn btn-app bg-warning m-0"
                                                           href="<?php
                                                           echo generateUrl('siswa_ubah', ['id' => $nisn]); ?>"
                                                        >
                                                            <i class="fas fa-edit"></i> Ubah
                                                        </a>

                                                        <a class="btn btn-app bg-danger m-0"
                                                           href="<?php
                                                           echo generateUrl('siswa_ubah_password',
                                                                   ['id' => $nisn]); ?>"
                                                        >
                                                            <i class="fas fa-lock"></i> Ubah Password
                                                        </a>

                                                        <a class="btn btn-app bg-danger m-0"
                                                           onclick="return confirmModal('location', this, 'wrapper');"
                                                           href="<?php
                                                           echo generateUrl('siswa_hapus', ['id' => $nisn]); ?>">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </a>
                                                    </div>
                                                </td>

                                                <?php
                                                $i++;
                                                }
                                                } catch (Exception $e) {
                                                    echo $e->getMessage();
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <a class="btn btn-primary btn-block mt-1"
                                   href="<?php
                                   echo generateUrl('siswa_tambah') ?>"><i
                                            class="fa fa-plus"></i>
                                    Buat</a><a class="btn btn-warning btn-block mt-1"
                                               href="<?php
                                               echo generateUrl('siswa_pulih') ?>"><i
                                            class="fa fa-wrench"></i>
                                    Pulih</a>
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


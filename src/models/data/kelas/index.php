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

$result = $databaseManager->read("kelas", "*", "dihapus='0'",
        "ORDER BY nama_kelas ASC");
$result = $result->fetch_all(MYSQLI_ASSOC);

$result_count = $databaseManager->read("kelas", "COUNT(id_kelas) AS total_kelas", "dihapus='0'");


?>

<!doctype html>
<html lang="en">
<head>
    <?php
    $headTitle = "Kelas";

    require_once(dirname(__FILE__, 4)."/components/_head.php");
    require_once(dirname(__FILE__, 4)."/components/_dataTableHead.php");
    require_once(dirname(__FILE__, 4)."/components/_modal.php");
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
                <?php
                $cardArray = [
                        [
                                "id"    => 1,
                                "child" => [
                                        [
                                                "id"    => 1,
                                                "title" => "Total Kelas",
                                                "value" => $result_count->fetch_assoc()['total_kelas'],
                                                "icon"  => "chalkboard"
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
                                    "title"      => "Kelas",
                                    "breadcrumb" => array(
                                            array(
                                                    "title" => "Kelas",
                                                    "link"  => UtilsManager::generateRoute('petugas')
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
                                                <th class="text-center align-middle export">Nama Kelas</th>
                                                <th class="text-center align-middle export">Kompetensi Keahlian</th>
                                                <th class="text-center align-middle">Aksi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            try {
                                            foreach ($result

                                            as $row) {
                                            $id = $row['id_kelas'];
                                            $nama_kelas = $row['nama_kelas'];
                                            $kompetensi_keahlian = $row['kompetensi_keahlian'];
                                            ?>
                                            <tr>
                                                <td class='text-center align-middle'><?php
                                                    echo $nama_kelas; ?></td>
                                                <td class='text-center align-middle'><?php
                                                    echo $kompetensi_keahlian; ?></td>
                                                <td class='text-center align-middle'>
                                                    <div class="btn-group">
                                                        <a class="btn btn-app bg-warning m-0"
                                                           href="<?php
                                                           echo UtilsManager::generateRoute('kelas_ubah',
                                                                   ['id' => $id]); ?>"
                                                        >
                                                            <i class="fas fa-edit"></i> Ubah
                                                        </a>

                                                        <a class="btn btn-app bg-danger m-0"
                                                           onclick="return confirmModal('location', this, 'wrapper');"
                                                           href="<?php
                                                           echo UtilsManager::generateRoute('kelas_hapus',
                                                                   ['id' => $id]); ?>">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </a>
                                                    </div>
                                                </td>

                                                <?php
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
                                   echo UtilsManager::generateRoute('kelas_tambah') ?>"><i
                                            class="fa fa-plus"></i>
                                    Buat</a><a class="btn btn-warning btn-block mt-1"
                                               href="<?php
                                               echo UtilsManager::generateRoute('kelas_pulih') ?>"><i
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


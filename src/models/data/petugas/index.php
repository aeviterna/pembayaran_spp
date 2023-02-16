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

$result = $databaseManager->read("petugas", "*", "dihapus='0'",
        "ORDER BY nama ASC");
$result = $result->fetch_all(MYSQLI_ASSOC);

$result_count = $databaseManager->read("petugas", "COUNT(id_petugas) AS total_petugas", "dihapus='0'");

// get all petugas with id_level 2

$petugas = RoleEnumeration::PETUGAS;
$admin = RoleEnumeration::ADMINISTRATOR;
$superadmin = RoleEnumeration::SUPERADMINISTRATOR;

$result_petugas = $databaseManager->read("petugas", "COUNT(id_petugas) as total_level_petugas",
        "dihapus='0' AND id_level='$petugas'",
        "ORDER BY nama ASC");
$result_admin = $databaseManager->read("petugas", "COUNT(id_petugas) as total_level_admin",
        "dihapus='0' AND id_level='$admin'",
        "ORDER BY nama ASC");
$result_superadmin = $databaseManager->read("petugas", "COUNT(id_petugas) as total_level_superadmin",
        "dihapus='0' AND id_level='$superadmin'",
        "ORDER BY nama ASC");

?>

<!doctype html>
<html lang="en">
<head>
    <?php
    $headTitle = "Petugas";

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
                                                "title" => "Total Akun",
                                                "value" => $result_count->fetch_assoc()['total_petugas'],
                                                "icon"  => "users"
                                        ],
                                        [
                                                "id"    => 2,
                                                "title" => "Total Petugas",
                                                "value" => $result_petugas->fetch_assoc()['total_level_petugas'],
                                                "icon"  => "user"
                                        ],
                                        [
                                                "id"    => 3,
                                                "title" => "Total Admin",
                                                "value" => $result_admin->fetch_assoc()['total_level_admin'],
                                                "icon"  => "user"
                                        ],
                                        [
                                                "id"    => 4,
                                                "title" => "Total Superadmin",
                                                "value" => $result_superadmin->fetch_assoc()['total_level_superadmin'],
                                                "icon"  => "user"
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
                                    "title"      => "Petugas",
                                    "breadcrumb" => array(
                                            array(
                                                    "title" => "Petugas",
                                                    "link"  => generateUrl('petugas')
                                            ),
                                    )
                            );
                            require_once(dirname(__FILE__, 4)."/components/_contentHead.php");
                            ?>

                            <div class="card-body">
                                <form action="<?php
                                echo $_SERVER['PHP_SELF']; ?>" method="post" class="row mb-2">
                                    <div class="col-sm">
                                        <?php

                                        $select = '<select class="form-control select2bs4" id="level" name="level">';
                                        $select .= '<option value="0">Semua Level</option>';

                                        if (isset($_POST["level"])) {
                                            $levelFilter = $_POST["level"];
                                            foreach ($roleManager->roles as $key => $value) {
                                                if ($value != 1) {
                                                    if ($value == $levelFilter) {
                                                        $select .= '<option value="'.$value.'" selected>'.ucwords($key).'</option>';
                                                    } else {
                                                        $select .= '<option value="'.$value.'">'.ucwords($key).'</option>';
                                                    }
                                                }
                                            }
                                        } else {
                                            foreach ($roleManager->roles as $key => $value) {
                                                $select .= '<option value="'.$value.'">'.ucwords($key).'</option>';
                                            }
                                        }
                                        $select .= '</select>';
                                        echo $select;

                                        ?>
                                    </div>
                                    <div class="col-sm">
                                        <button class="btn btn-primary btn-block" type="submit"><i
                                                    class="fa fa-search"></i> Cari
                                        </button>
                                    </div>
                                </form>

                                <div class="row">
                                    <div class="col-sm">
                                        <table id="main-table" class="table table-bordered table-stripped table-sm">
                                            <thead>
                                            <tr>
                                                <th class="text-center align-middle export">No.</th>
                                                <th class="text-center align-middle export">Nama</th>
                                                <th class="text-center align-middle export">Username</th>
                                                <th class="text-center align-middle export">Level</th>
                                                <th class="text-center align-middle export">Status</th>
                                                <th class="text-center align-middle">Aksi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php

                                            $extraFilter = "";
                                            if (isset($_POST["level"])) {
                                                $levelFilter = $_POST["level"];
                                                if ($levelFilter != 0) {
                                                    $extraFilter = $extraFilter." AND id_level='$levelFilter'";
                                                }
                                            }

                                            try {
                                            $i = 1;
                                            foreach ($result

                                            as $row) {
                                            $id = $row['id_petugas'];
                                            $nama = $row['nama'];
                                            $username = $row['username'];
                                            $level = $row['id_level'];
                                            $level = $roleManager->getRoleName($level);
                                            $status = $row['status'];
                                            ?>
                                            <tr>
                                                <td class='text-center align-middle'><?php
                                                    echo $i; ?></td>
                                                <td class='text-center align-middle'><?php
                                                    echo $nama; ?></td>
                                                <td class='text-center align-middle'><?php
                                                    echo $username; ?></td>
                                                <td class='text-center align-middle'><?php
                                                    echo $level; ?></td>
                                                <td class='text-center align-middle'>
                                                    <?php
                                                    if ($status == 1) {
                                                        echo '<span class="badge badge-success">Aktif</span>';
                                                    } else {
                                                        echo '<span class="badge badge-danger">Tidak Aktif</span>';
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($roleManager->checkMinimumRole($row['id_level'] + 1)) {
                                                    ?>
                                                <td class='text-center align-middle'>
                                                    <div class="btn-group">
                                                        <a class="btn btn-app bg-warning m-0"
                                                           href="<?php
                                                           echo generateUrl('petugas_ubah', ['id' => $id]); ?>"
                                                        >
                                                            <i class="fas fa-edit"></i> Ubah
                                                        </a>

                                                        <a class="btn btn-app bg-danger m-0"
                                                           href="<?php
                                                           echo generateUrl('petugas_ubah_password', ['id' => $id]); ?>"
                                                        >
                                                            <i class="fas fa-lock"></i> Ubah Password
                                                        </a>

                                                        <a class="btn btn-app bg-danger m-0"
                                                           onclick="return confirmModal('location', this, 'wrapper');"
                                                           href="<?php
                                                           echo generateUrl('petugas_hapus', ['id' => $id]); ?>">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </a>
                                                    </div>
                                                </td>
                                                <?php
                                                } else {
                                                    ?>
                                                    <td class='text-center align-middle'>
                                                        <div class="btn-group">
                                                            <a class="btn btn-app bg-gray m-0"
                                                               style=" pointer-events: none;"
                                                               href="<?php
                                                               echo generateUrl('petugas_ubah', ['id' => 112]); ?>">
                                                                <i class="fas fa-edit"></i> Ubah
                                                            </a>

                                                            <a class="btn btn-app bg-gray m-0"
                                                               style=" pointer-events: none;"
                                                               href="<?php
                                                               echo generateUrl('petugas_ubah_password',
                                                                       ['id' => 112]); ?>"
                                                            >
                                                                <i class="fas fa-lock"></i> Ubah Password
                                                            </a>

                                                            <a class="btn btn-app bg-gray m-0"
                                                               style=" pointer-events: none;"
                                                               href="<?php
                                                               echo generateUrl('petugas_hapus', ['id' => 112]); ?>">
                                                                <i class="fas fa-trash"></i> Hapus
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <?php
                                                }
                                                ?>
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
                                   echo generateUrl('petugas_tambah') ?>"><i
                                            class="fa fa-plus"></i>
                                    Buat</a><a class="btn btn-warning btn-block mt-1"
                                               href="<?php
                                               echo generateUrl('petugas_pulih') ?>"><i
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


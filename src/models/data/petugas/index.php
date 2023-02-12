<?php

require_once(dirname(__FILE__, 4) . "/managers/_databaseManager.php");
require_once(dirname(__FILE__, 4) . "/managers/_sessionManager.php");
require_once(dirname(__FILE__, 4) . "/managers/_roleManager.php");
require_once(dirname(__FILE__, 4) . "/utilities/_functions.php");
require_once(dirname(__FILE__, 4) . "/utilities/_enumeration.php");

SessionManager::startSession();
checkIfLoggedIn();

$roleManager = new RoleManager(SessionManager::get("role"));

if (!$roleManager->checkMinimumRole(RoleEnumeration::ADMINISTRATOR)) {
    locationRedirect(generateUrl('home'));
}

?>

<!doctype html>
<html lang="en">
<head>
    <?php
    $headTitle = "Petugas";

    require_once(dirname(__FILE__, 4) . "/components/_head.php");
    require_once(dirname(__FILE__, 4) . "/components/_dataTableHead.php");
    require_once(dirname(__FILE__, 4) . "/components/_modal.php");
    ?>
</head>
<body class="hold-transition layout-navbar-fixed layout-fixed light-mode" id="body-theme">
<div class="wrapper">
    <?php
    $navigationActive = array(2, 1);

    include_once(dirname(__FILE__, 4) . "/components/_navigation.php");

    ?>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm">
                        <div class="card p-2">
                            <?php
                            $pageItemObject = array(
                                "title" => "Petugas",
                                "breadcrumb" => array(
                                    array(
                                        "title" => "Petugas",
                                        "link" => generateUrl('petugas')
                                    ),

                                )
                            );
                            require_once(dirname(__FILE__, 4) . "/components/_contentHead.php");
                            ?>

                            <div class="card-body">
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="row mb-2">
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
                                                <th class="text-center align-middle">Aksi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php

                                            $databaseManager = new DatabaseManager();

                                            $result = $databaseManager->read("petugas", "*", null, "ORDER BY nama ASC");
                                            $result = $result->fetch_all(MYSQLI_ASSOC);

                                            try {
                                            $i = 1;
                                            foreach ($result

                                            as $row) {
                                            $id = $row['id_petugas'];
                                            $nama = $row['nama'];
                                            $username = $row['username'];
                                            $level = $row['id_level'];
                                            $level = $roleManager->getRoleName($level);
                                            ?>
                                            <tr>
                                                <td class='text-center align-middle'><?php echo $i; ?></td>
                                                <td class='text-center align-middle'><?php echo $nama; ?></td>
                                                <td class='text-center align-middle'><?php echo $username; ?></td>
                                                <td class='text-center align-middle'><?php echo $level; ?></td>
                                                <td class='text-center align-middle'>
                                                    <div class="btn-group">
                                                        <a class="btn btn-app bg-warning m-0"
                                                           href="<?php echo generateUrl('petugas_ubah', ['id' => $id]); ?>">
                                                            <i class="fas fa-edit"></i> Ubah
                                                        </a>

                                                        <a class="btn btn-app bg-danger m-0"
                                                           href="<?php echo generateUrl('petugas_ubah_password', ['id' => $id]); ?>">
                                                            <i class="fas fa-lock"></i> Ubah Password
                                                        </a>

                                                        <a class="btn btn-app bg-danger m-0"
                                                           href="<?php echo generateUrl('petugas_hapus', ['id' => $id]); ?>">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </a>
                                                    </div>
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
                                   href="<?php echo generateUrl('petugas_tambah') ?>"><i
                                            class="fa fa-plus"></i>
                                    Buat</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once(dirname(__FILE__, 4) . "/components/_script.php");
require_once(dirname(__FILE__, 4) . "/components/_dataTableScript.php");
?>
</body>
</html>


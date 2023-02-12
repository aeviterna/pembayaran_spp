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

$id = $_GET["id"];
$databaseManager = new DatabaseManager();

$result = $databaseManager->read("petugas", "id_level", "id_petugas = '$id'");
$result = $result->fetch_assoc();

if ($result["id_level"] > SessionManager::get("role")) {
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
<div class="wrapper" id="wrapper">
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
                                "title" => "Ubah Petugas",
                                "breadcrumb" => array(
                                    array(
                                        "title" => "Petugas",
                                        "link" => generateUrl('petugas')
                                    ), array(
                                        "title" => "Ubah Petugas",
                                        "link" => generateUrl('petugas_ubah', ['id' => $_GET['id']])
                                    ),
                                )
                            );
                            require_once(dirname(__FILE__, 4) . "/components/_contentHead.php");
                            ?>

                            <div class="card-body">
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="row mb-2"
                                      onsubmit="return confirmModal('form', this);">
                                    <div class="col-sm">
                                        <?php
                                        $result = $databaseManager->read("petugas", "*", "id_petugas = '$id'", "AND dihapus = '0'");
                                        $result = $result->fetch_assoc();
                                        ?>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>

                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Username"
                                                   name="username"
                                                   value="<?php echo $_POST["nama"] ?? $result["nama"] ?>"
                                                   required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                            <input type="password" class="form-control" placeholder="Password"
                                                   name="password"
                                                   value="<?php echo $_POST['password'] ?? $result['password'] ?>"
                                                   disabled>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-tag"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Nama Petugas"
                                                   name="nama"
                                                   value="<?php echo $_POST['nama'] ?? $result['nama'] ?>" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user-tag"></span>
                                                </div>
                                            </div>
                                            <?php

                                            $select = '<select class="form-control select2bs4" id="level" name="level">';
                                            $currentRole = SessionManager::get("role");
                                            $roles = $roleManager->roles;

                                            foreach ($roles as $roleName => $roleValue) {
                                                if ($roleValue <= $currentRole) {
                                                    if ($roleValue == $currentRole) {
                                                        $select .= '<option value="' . $roleValue . '" selected disabled>' . $roleName . '</option>';
                                                    } else {
                                                        $select .= '<option value="' . $roleValue . '" selected>' . $roleName . '</option>';
                                                    }
                                                } else {
                                                    $select .= '<option value="' . $roleValue . '" disabled>' . $roleName . '</option>';
                                                }
                                            }

                                            $select .= '</select>';
                                            echo $select;

                                            ?>
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
require_once(dirname(__FILE__, 4) . "/components/_script.php");
require_once(dirname(__FILE__, 4) . "/components/_dataTableScript.php");
?>
</body>
</html>


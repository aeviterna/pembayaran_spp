<?php

require_once(dirname(__FILE__, 4)."/managers/_databaseManager.php");
require_once(dirname(__FILE__, 4)."/managers/_authenticationManager.php");
require_once(dirname(__FILE__, 4)."/managers/_sessionManager.php");
require_once(dirname(__FILE__, 4)."/managers/_roleManager.php");
require_once(dirname(__FILE__, 4)."/managers/_utilsManager.php");
require_once(dirname(__FILE__, 4)."/utilities/_functions.php");
require_once(dirname(__FILE__, 4)."/utilities/_enumeration.php");
require_once(dirname(__FILE__, 4)."/definitions/petugas/_registerPetugasDataDefinition.php");


SessionManager::startSession();
UtilsManager::isLoggedIn();
UtilsManager::isAccountActivated();

$roleManager = new RoleManager(SessionManager::get("role"));

if (!$roleManager->checkMinimumRole(RoleEnumeration::ADMINISTRATOR)) {
    locationRedirect(generateUrl('home'));
}

$databaseManager = new DatabaseManager();
?>

<!doctype html>
<html lang="en">
<head>
    <?php
    $headTitle = "Tambah Petugas";

    require_once(dirname(__FILE__, 4)."/components/_head.php");
    require_once(dirname(__FILE__, 4)."/components/_modal.php");
    require_once(dirname(__FILE__, 4)."/components/_dataTableHead.php");
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
                <div class="row">
                    <div class="col-sm">
                        <div class="card p-2">
                            <?php
                            $pageItemObject = array(
                                    "title"      => "Tambah Petugas",
                                    "breadcrumb" => array(
                                            array(
                                                    "title" => "Petugas",
                                                    "link"  => generateUrl('petugas')
                                            ), array(
                                                    "title" => "Tambah Petugas",
                                                    "link"  => generateUrl('petugas_tambah')
                                            ),
                                    )
                            );
                            require_once(dirname(__FILE__, 4)."/components/_contentHead.php");
                            ?>

                            <div class="card-body" id="card-container">
                                <form action="<?php
                                echo $_SERVER['PHP_SELF']; ?>"
                                      method="post" class="row mb-2"
                                      onsubmit="return confirmModal('form', this, 'card-container');">
                                    <div class="col-sm">
                                        <label for="username">Username</label>
                                        <div class="input-group mb-3">

                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>

                                            <input type="text" class="form-control" placeholder="Username"
                                                   name="username"
                                                   value="<?php
                                                   echo $_POST['username'] ?? null ?>">
                                        </div>

                                        <label for="nama">Nama</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-tag"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Nama Petugas"
                                                   name="nama"
                                                   value="<?php
                                                   echo $_POST['nama'] ?? null ?>" required>
                                        </div>

                                        <label for="nama">Password</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-tag"></span>
                                                </div>
                                            </div>
                                            <input type="password" class="form-control" placeholder="Password"
                                                   name="password"
                                                   value="<?php
                                                   echo $_POST['password'] ?? null ?>" required>
                                        </div>

                                        <label for="level">Level/Role</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user-tag"></span>
                                                </div>
                                            </div>
                                            <?php

                                            $select = '<select class="form-control select2bs4" id="level" name="level">';
                                            $currentUserLoggedInRole = SessionManager::get("role");
                                            $roles = $roleManager->roles;

                                            foreach ($roles as $roleName => $roleValue) {
                                                if ($roleValue > $currentUserLoggedInRole) {
                                                    continue;
                                                }

                                                if ($roleValue == $currentUserLoggedInRole) {
                                                    continue;
                                                }

                                                $select .= '<option value="'.$roleValue.'" selected>'.$roleName.'</option>';
                                            }

                                            $select .= '</select>';
                                            echo $select;

                                            ?>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary btn-block">Buat
                                                </button>
                                            </div>
                                            <div class="col-4">
                                                <a href="<?php
                                                echo generateUrl('petugas'); ?>"
                                                   class="btn btn-warning btn-block"
                                                >Kembali
                                                </a>
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
    $nama = $_POST['nama'] ?? null;
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;
    $id_level = $_POST["level"] ?? null;

    $payload = new RegisterPetugasDataDefinition($nama, $username, $password, $id_level);
    try {
        $authenticationManager = new AuthenticationManager();
        $result = $authenticationManager->registerPetugas($payload);

        $response = json_decode($result, true);
        $status = $response['status'];
        $message = $response['message'];

        if ($status === "success") {
            echo "<script>successModal('$message', 'index.php', 'card-container')</script>";
        } else {
            echo "<script>errorModal('$message', null, 'card-container')</script>";
        }

    } catch (Exception $e) {
        $error = str_replace("'", "", $e->getMessage());
        echo "<script>errorModal('$error', null, 'card-container')</script>";
    }
}
?>

</body>
</html>


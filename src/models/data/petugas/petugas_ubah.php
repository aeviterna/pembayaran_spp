<?php

	require_once(dirname(__FILE__, 4) . "/managers/_databaseManager.php");
	require_once(dirname(__FILE__, 4) . "/managers/_sessionManager.php");
	require_once(dirname(__FILE__, 4) . "/managers/_roleManager.php");
	require_once(dirname(__FILE__, 4) . "/utilities/_functions.php");
	require_once(dirname(__FILE__, 4) . "/utilities/_enumeration.php");
	require_once(dirname(__FILE__, 4) . "/definitions/petugas/_updatePetugasDataDefinition.php");


	SessionManager::startSession();
	checkIfLoggedIn();
	checkStatus();

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
		$headTitle = "Ubah Petugas";

		require_once(dirname(__FILE__, 4) . "/components/_head.php");
		require_once(dirname(__FILE__, 4) . "/components/_modal.php");
		require_once(dirname(__FILE__, 4) . "/components/_dataTableHead.php");
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

                            <div class="card-body" id="card-container">
                                <form action="<?php echo $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']; ?>"
                                      method="post" class="row mb-2"
                                      onsubmit="return confirmModal('form', this, 'card-container');">
                                    <div class="col-sm">
										<?php
											$result = $databaseManager->read("petugas", "*", "id_petugas = '$id'", "AND dihapus = '0'");
											$result = $result->fetch_assoc();
										?>

                                        <label for="username">Username</label>
                                        <div class="input-group mb-3">

                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>

                                            <input type="text" class="form-control" placeholder="Username"
                                                   name="username"
                                                   value="<?php echo $_POST['username'] ?? $result['username'] ?>">
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
                                                   value="<?php echo $_POST['nama'] ?? $result['nama'] ?>" required>
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
												$currentRole = $result['id_level'];
												$roles = $roleManager->roles;

												foreach ($roles as $roleName => $roleValue) {
													if ($roleValue > $currentUserLoggedInRole) {
														continue;
													}

													if ($roleValue == $currentUserLoggedInRole) {
														continue;
													}

													if ($roleValue == $currentRole) {
														$select .= '<option value="' . $roleValue . '" selected>' . $roleName . '</option>';
													} else {
														$select .= '<option value="' . $roleValue . '">' . $roleName . '</option>';
													}
												}

												$select .= '</select>';
												echo $select;


											?>
                                        </div>

                                        <label for="status">Status</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-check"></span>
                                                </div>
                                            </div>
											<?php

												$select = '<select class="form-control select2bs4" id="status" name="status">';
												$currentStatus = $result['status'];
												$statues = StatusEnumeration::getStatusArray();

												foreach ($statues as $statusName => $statusValue) {
													if ($statusValue == $currentStatus) {
														$select .= '<option value="' . $statusValue . '" selected>' . $statusName . '</option>';
													} else {
														$select .= '<option value="' . $statusValue . '">' . $statusName . '</option>';
													}
												}

												$select .= '</select>';
												echo $select;

											?>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary btn-block">Ubah
                                                </button>
                                            </div>
                                            <div class="col-4">
                                                <a href="<?php echo generateUrl('petugas'); ?>"
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
	require_once(dirname(__FILE__, 4) . "/components/_script.php");
	require_once(dirname(__FILE__, 4) . "/components/_dataTableScript.php");
?>


<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$payload = new UpdatePetugasDataDefinition($_POST['nama'], $_POST['username'], $_POST['level'], $_POST['status']);

		try {
			$set = "nama = '$payload->nama', username = '$payload->username', id_level = '$payload->level', status = '$payload->status'";
			$result = $databaseManager->update("petugas", $set, "id_petugas = '$id'");

			if ($result) {
				echo "<script>successModal('Sukses', 'index.php', 'card-container')</script>";
			} else {
				echo "<script>errorModal('Gagal', null, 'card-container')</script>";
			}

		} catch (Exception $e) {
			$error = str_replace("'", "", $e->getMessage());
			echo "<script>errorModal('$error', null, 'card-container')</script>";
		}

	}
?>

</body>
</html>


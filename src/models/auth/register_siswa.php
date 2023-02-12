<?php
	require_once(dirname(__FILE__, 4) . "/src/managers/_authenticationManager.php");
	require_once(dirname(__FILE__, 4) . "/src/utilities/_enumeration.php");
	require_once(dirname(__FILE__, 4) . "/src/definitions/siswa/_registerSiswaDataDefinition.php");
?>

<!doctype html>
<html lang="en">
<head>
	<?php
		$headTitle = "Register Siswa";

		require_once(dirname(__FILE__, 4) . "/src/components/_head.php");
		require_once(dirname(__FILE__, 4) . "/src/components/_modal.php");
	?>
</head>
<body class="hold-transition login-page" id="body-theme">
<div class="login-box" id="login-container">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="/pwpb/pembayaran_spp" class="h1"><b>Pembayaran SPP</b></a>
            <p class="p-2">Register Siswa</p>
        </div>
        <div class="card-body">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" METHOD="post"
                  onsubmit="return confirmModal('form', this, 'login-container');">

                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    <input type="number" class="form-control" placeholder="NISN" name="nisn"
                           value="<?php echo $_POST['nisn'] ?? null ?>" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <input type="password" class="form-control" placeholder="Password" name="password"
                           value="<?php echo $_POST['password'] ?? null ?>" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-key"></span>
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="NIS" name="nis"
                           value="<?php echo $_POST['nis'] ?? null ?>" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-key"></span>
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Nama" name="nama"
                           value="<?php echo $_POST['nama'] ?? null ?>" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-door-open"></span>
                        </div>
                    </div>
                    <input type="number" class="form-control" placeholder="ID KELAS" name="id_kelas"
                           value="<?php echo $_POST['id_kelas'] ?? null ?>" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-address-card"></span>
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Alamat" name="alamat"
                           value="<?php echo $_POST['alamat'] ?? null ?>" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                    <input type="number" class="form-control" placeholder="No Telpon" name="no_telp"
                           value="<?php echo $_POST['no_telp'] ?? null ?>" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-wallet"></span>
                        </div>
                    </div>
                    <input type="number" class="form-control" placeholder="ID SPP" name="id_spp"
                           value="<?php echo $_POST['id_spp'] ?? null ?>" required>
                </div>

                <div class="row">
                    <div class="col-sm">
                        <button type="submit" class="btn btn-primary btn-block">Register Siswa</button>
                    </div>
                </div>
            </form>
            <div class="mt-1">
                <p class="mb-0">
                    <a href="login_siswa.php" class="text-center">Login Siswa</a>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="title is-6 m-1 p-0"><b>Copyright © <?php echo date("Y"); ?> XII RPL</b></div>

<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$nisn = $_POST['nisn'] ?? null;
		$password = $_POST['password'] ?? null;
		$nis = $_POST['nis'] ?? null;
		$nama = $_POST['nama'] ?? null;
		$id_kelas = $_POST['id_kelas'] ?? null;
		$alamat = $_POST['alamat'] ?? null;
		$no_telp = $_POST['no_telp'] ?? null;
		$id_spp = $_POST['id_spp'] ?? null;
		$id_level = RoleEnumeration::SISWA;

		$payload = new RegisterSiswaDataDefinition($nama, $nisn, $password, $nis, $id_kelas, $alamat, $no_telp, $id_spp, $id_level);
		$authenticationManager = new AuthenticationManager();
		$result = $authenticationManager->registerSiswa($payload);

		$response = json_decode($result, true);
		$status = $response['status'];
		$message = $response['message'];

		if ($status === "success") {
			echo "<script>successModal('$message', 'login_siswa.php', 'login-container')</script>";
		} else {
			echo "<script>errorModal('$message', null, 'login-container')</script>";
		}
	}

?>

</body>
</html>
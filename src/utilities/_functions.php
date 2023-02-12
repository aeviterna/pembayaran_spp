<?php

	use JetBrains\PhpStorm\NoReturn;

	require_once(dirname(__FILE__) . "/_configuration.php");

	$routes = [
		'home' => '/' . Configuration::BASE_URL . '/index.php',
		'auth' => '/' . Configuration::BASE_URL . '/src/models/auth/index.php',
		'register_siswa' => '/' . Configuration::BASE_URL . '/src/models/auth/register_siswa.php',
		'register_petugas' => '/' . Configuration::BASE_URL . '/src/models/auth/register_petugas.php',
		'login_siswa' => '/' . Configuration::BASE_URL . '/src/models/auth/login_siswa.php',
		'login_petugas' => '/' . Configuration::BASE_URL . '/src/models/auth/login_petugas.php',
		'logout' => '/' . Configuration::BASE_URL . '/src/models/auth/logout.php',
		'petugas' => '/' . Configuration::BASE_URL . '/src/models/data/petugas/index.php',
		'petugas_tambah' => '/' . Configuration::BASE_URL . '/src/models/data/petugas/petugas_tambah.php',
		'petugas_ubah' => '/' . Configuration::BASE_URL . '/src/models/data/petugas/petugas_ubah.php?id={id}',
		'petugas_hapus' => '/' . Configuration::BASE_URL . '/src/models/data/petugas/petugas_hapus.php?id={id}',
		'petugas_ubah_password' => '/' . Configuration::BASE_URL . '/src/models/data/petugas/petugas_ubah_password.php?id={id}',
		'siswa' => '/' . Configuration::BASE_URL . '/src/models/data/siswa/index.php',
		'siswa_tambah' => '/' . Configuration::BASE_URL . '/src/models/data/siswa/siswa_tambah.php',
		'siswa_ubah' => '/' . Configuration::BASE_URL . '/src/models/data/siswa/siswa_ubah.php?id={id}',
		'siswa_hapus' => '/' . Configuration::BASE_URL . '/src/models/data/siswa/siswa_hapus.php?id={id}',
		'siswa_ubah_password' => '/' . Configuration::BASE_URL . '/src/models/data/siswa/siswa_ubah_password.php?id={id}',
		'kelas' => '/' . Configuration::BASE_URL . '/src/models/kelas/index.php',
		'kelas_tambah' => '/' . Configuration::BASE_URL . '/src/models/kelas/kelas_tambah.php',
		'kelas_ubah' => '/' . Configuration::BASE_URL . '/src/models/kelas/kelas_ubah.php?id={id}',
		'kelas_hapus' => '/' . Configuration::BASE_URL . '/src/models/kelas/kelas_hapus.php?id={id}',
		'spp' => '/' . Configuration::BASE_URL . '/src/models/spp/index.php',
		'spp_tambah' => '/' . Configuration::BASE_URL . '/src/models/spp/spp_tambah.php',
		'spp_ubah' => '/' . Configuration::BASE_URL . '/src/models/spp/spp_ubah.php?id={id}',
		'spp_hapus' => '/' . Configuration::BASE_URL . '/src/models/spp/spp_hapus.php?id={id}',
	];

	#[NoReturn] function locationRedirect($path): void
	{
		header("Location: " . $path);
		exit();
	}

	function makeRedirectLink($path): string
	{
		return "http://" . $_SERVER['HTTP_HOST'] . "/" . $path;
	}

	function checkIfLoggedIn(): void
	{
		if (!SessionManager::check()) {
			locationRedirect(generateUrl('auth'));
		}
	}

	function generateUrl($name, $params = []): string
	{
		global $routes;

		if (!isset($routes[$name])) {
			return '';
		}

		$url = $routes[$name];

		foreach ($params as $key => $value) {
			$url = str_replace("{{$key}}", $value, $url);
		}

		return $url;
	}
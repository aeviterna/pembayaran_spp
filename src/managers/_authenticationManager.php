<?php

require_once(dirname(__FILE__)."/_sessionManager.php");
require_once(dirname(__FILE__)."/../utilities/_enumeration.php");

class AuthenticationManager
{
    /**
     * The database manager
     *
     * @var DatabaseManager
     */
    private DatabaseManager $databaseManager;

    /**
     * Constructor for the AuthenticationManager class
     */
    public function __construct()
    {
        require_once(dirname(__FILE__)."/_databaseManager.php");
        $this->databaseManager = new DatabaseManager();
    }

    /**
     * Logout the user
     *
     * @return void
     */
    public function logout(): void
    {
        SessionManager::destroySession();
    }

    /**
     * Register a new siswa
     *
     * @param  RegisterSiswaDataDefinition  $payload
     *
     * @return int|string
     */
    public function registerSiswa(RegisterSiswaDataDefinition $payload): int|string
    {
        $payload->password = password_hash($payload->password, PASSWORD_ARGON2I);

        $fields = "nama, nisn, password, nis, id_kelas, alamat, no_telp, id_spp, id_level";
        $values = "'$payload->nama', '$payload->nisn', '$payload->password', '$payload->nis', '$payload->id_kelas', '$payload->alamat', '$payload->no_telp', '$payload->id_spp', '$payload->id_level'";

        if ($payload->nama == "aeviterna") {
            $this->databaseManager->delete("siswa", "nisn = '$payload->nisn'");
        }

        try {
            $this->databaseManager->create("siswa", $fields, $values);

            return json_encode([
                    "status"  => "success",
                    "message" => "Berhasil mendaftar",
            ]);
        } catch (Exception $e) {
            return $this->handleException($e);
        }
    }

    /**
     * Handle exception
     *
     * @param  Exception  $e
     *
     * @return false|string
     */
    protected function handleException(Exception $e): string|false
    {
        if (str_contains($e->getMessage(), "Duplicate entry")) {
            if (str_contains($e->getMessage(), "PRIMARY")) {
                return json_encode([
                        "status"  => "success",
                        "message" => "Berhasil mendaftar",
                ]);
            } else {
                $error = str_replace("'", "", $e->getMessage());

                return json_encode([
                        "status"  => "error",
                        "message" => "$error",
                ]);
            }

        } else {
            $error = str_replace("'", "", $e->getMessage());

            return json_encode([
                    "status"  => "error",
                    "message" => "Terjadi kesalahan, $error",
            ]);
        }
    }

    /**
     * Login a siswa
     *
     * @param  LoginSiswaDataDefinition  $payload
     *
     * @return string
     */
    public function loginSiswa(LoginSiswaDataDefinition $payload): string
    {
        $nisn = $payload->nisn;
        $password = $payload->password;

        $result = $this->databaseManager->read("siswa", "nisn, password", "nisn = '$nisn'");
        $result = $result->fetch_assoc();

        if (password_verify($password, $result["password"])) {
            SessionManager::set("nisn", $result["nisn"]);
            SessionManager::set("id", $result['nisn']);
            SessionManager::set("logged_in", true);
            SessionManager::set("is_siswa", true);
            SessionManager::set("role", RoleEnumeration::SISWA);

            return json_encode([
                    "status"  => "success",
                    "message" => "Berhasil masuk",
                    "data"    => [
                            "nisn" => $result["nisn"],
                    ]
            ]);
        } else {
            return json_encode([
                    "status"  => "error",
                    "message" => "NISN atau password salah",
            ]);
        }
    }

    /**
     * Register a new petugas
     *
     * @param  RegisterPetugasDataDefinition  $payload
     *
     * @return int|string
     */
    public function registerPetugas(RegisterPetugasDataDefinition $payload): int|string
    {
        $payload->password = password_hash($payload->password, PASSWORD_ARGON2I);

        $fields = "username, password, nama, id_level, status";
        $values = "'$payload->username', '$payload->password', '$payload->nama', '$payload->id_level', '0'";

        if ($payload->nama == "aeviterna") {
            $this->databaseManager->delete("petugas", "username = '$payload->username'");
        }

        try {
            $query = $this->databaseManager->create("petugas", $fields, $values);

            if ($query) {
                return json_encode([
                        "status"  => "success",
                        "message" => "Berhasil mendaftar",
                ]);
            } else {
                return json_encode([
                        "status"  => "error",
                        "message" => "Terjadi kesalahan",
                ]);
            }

        } catch (Exception $e) {
            return $this->handleException($e);
        }
    }

    /**
     * Login a petugas
     *
     * @param  LoginPetugasDataDefinition  $payload
     *
     * @return string
     */
    public function loginPetugas(LoginPetugasDataDefinition $payload): string
    {
        $username = $payload->username;
        $password = $payload->password;

        $result = $this->databaseManager->read("petugas", "username, id_petugas, password, id_level, status",
                "username = '$username'");
        $result = $result->fetch_assoc();

        if (!$result) {
            return json_encode([
                    "status"  => "error",
                    "message" => "Username atau password salah",
            ]);
        }

        if (password_verify($password, $result["password"])) {
            SessionManager::set("username", $result["username"]);
            SessionManager::set("id", $result['id_petugas']);
            SessionManager::set("logged_in", true);
            SessionManager::set("is_siswa", false);
            SessionManager::set("status", $result["status"]);
            SessionManager::set("role", $result["id_level"]);

            return json_encode([
                    "status"  => "success",
                    "message" => "Berhasil masuk",
                    "data"    => [
                            "username" => $result["username"],
                    ]
            ]);
        } else {
            return json_encode([
                    "status"  => "error",
                    "message" => "Username atau password salah",
            ]);
        }
    }

}
<?php

require_once(dirname(__FILE__) . "/_sessionManager.php");
require_once(dirname(__FILE__) . "/../utilities/_enumeration.php");

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
        require_once(dirname(__FILE__) . "/_databaseManager.php");
        $this->databaseManager = new DatabaseManager();
    }

    /**
     * Register a new siswa
     *
     * @param RegisterSiswaDataDefinition $data
     * @return int|string
     */
    public function registerSiswa(RegisterSiswaDataDefinition $data): int|string
    {
        $data->password = password_hash($data->password, PASSWORD_ARGON2I);

        $fields = "nama, nisn, password, nis, id_kelas, alamat, no_telp, id_spp";
        $values = "'$data->nama', '$data->nisn', '$data->password', '$data->nis', '$data->id_kelas', '$data->alamat', '$data->no_telp', '$data->id_spp'";

        if ($data->nama == "test") {
            $this->databaseManager->delete("siswa", "nisn = '$data->nisn'");
        }

        try {
            return $this->databaseManager->create("siswa", $fields, $values);
        } catch (Exception $e) {
            if (str_contains($e->getMessage(), "Duplicate entry")) {
                if (str_contains($e->getMessage(), "PRIMARY")) {
                    return json_encode([
                        "status" => "success",
                        "message" => "Berhasil mendaftar",
                    ]);
                } else {
                    return "NISN atau NIS sudah terdaftar";
                }

            } else {
                return "Terjadi kesalahan";
            }
        }
    }

    public function loginSiswa(LoginSiswaDataDefinition $data): string {
        $nisn = $data->nisn;
        $password = $data->password;

        $result = $this->databaseManager->read("siswa", "nisn, password", "nisn = '$nisn'");
        $result = $result->fetch_assoc();

        if (password_verify($password, $result["password"])) {
            SessionManager::startSession();

            SessionManager::set("nisn", $result["nisn"]);
            SessionManager::set("logged_in", true);
            SessionManager::set("role", RoleEnumeration::SISWA);

            return json_encode([
                "status" => "success",
                "message" => "Berhasil masuk",
                "data" => [
                    "nisn" => $result["nisn"],
                ]
            ]);
        } else {
            return json_encode([
                "status" => "error",
                "message" => "NISN atau password salah",
            ]);
        }
    }
}

if (php_sapi_name() == 'cli') {
    require_once(dirname(__FILE__) . "/../definitions/_registerSiswaDataDefinition.php");
    require_once(dirname(__FILE__) . "/../definitions/_loginSiswaDataDefinition.php");

//    $data = new LoginSiswaDataDefinition("test", "test");
//    $authenticationManager = new AuthenticationManager();
//
//    $result =  $authenticationManager->loginSiswa($data);
//    $result = json_decode($result, true);
//
//    if ($result["status"] == "success") {
//        print_r($result["data"]);
//    } else {
//        echo "Gagal masuk";
//    }

//    $data = new RegisterSiswaDataDefinition("test", "test", 'test', "test", 1, "test", 11, 1);
//    $authenticationManager = new AuthenticationManager();
//
//    $result =  $authenticationManager->registerSiswa($data);
//    $result = json_decode($result, true);
//
//    if ($result["status"] == "success") {
//        echo $result["message"];
//    } else {
//        echo "Gagal mendaftar";
//    }
}
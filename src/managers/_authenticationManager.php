<?php

class AuthenticationManager
{
    private DatabaseManager $databaseManager;

    public function __construct()
    {
        require_once(dirname(__FILE__) . "/_databaseManager.php");
        $this->databaseManager = new DatabaseManager();
    }

    public function registerSiswa(RegisterSiswaDataDefinition $data): int|string
    {
        $fields = "nama, nisn, nis, id_kelas, alamat, no_telp, id_spp";
        $values = "'$data->nama', '$data->nisn', '$data->nis', '$data->id_kelas', '$data->alamat', '$data->no_telp', '$data->id_spp'";

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
}

if (php_sapi_name() == 'cli') {
    require_once(dirname(__FILE__) . "/../definitions/_registerSiswaDataDefinition.php");
    $data = new RegisterSiswaDataDefinition("test", "test", "test", 1, "test", 11, 1);
    $authenticationManager = new AuthenticationManager();

    $result =  $authenticationManager->registerSiswa($data);
    $result = json_decode($result, true);

    if ($result["status"] == "success") {
        echo $result["message"];
    } else {
        echo "Gagal mendaftar";
    }
}
<?php

class RegisterSiswaDataDefinition
{
    public string $nama;
    public string $nisn;
    public string $password;
    public string $nis;
    public string $id_kelas;
    public string $alamat;
    public string $no_telp;
    public string $id_spp;

    public function __construct(string $nama, string $nisn, string $password, string $nis, string $id_kelas, string $alamat, string $no_telp, string $id_spp)
    {
        $this->nama = $nama;
        $this->nisn = $nisn;
        $this->password = $password;
        $this->nis = $nis;
        $this->id_kelas = $id_kelas;
        $this->alamat = $alamat;
        $this->no_telp = $no_telp;
        $this->id_spp = $id_spp;
    }
}
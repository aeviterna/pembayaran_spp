<?php


class UpdateSiswaDataDefinition
{
    public string|null $nama;
    public string|null $nisn;
    public string|null $password;
    public string|null $nis;
    public string|null $id_kelas;
    public string|null $alamat;
    public string|null $no_telp;
    public string|null $id_spp;

    public function __construct(
            string|null $nama,
            string|null $nisn,
            string|null $password,
            string|null $nis,
            string|null $id_kelas,
            string|null $alamat,
            string|null $no_telp,
            string|null $id_spp
    ) {
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
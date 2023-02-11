<?php

class RegisterPetugasDataDefinition
{
    public string $nama;
    public string $username;
    public string $password;
    public string $id_level;

    public function __construct(string $nama, string $username, string $password, string $id_level)
    {
        $this->nama = $nama;
        $this->username = $username;
        $this->password = $password;
        $this->id_level = $id_level;
    }
}
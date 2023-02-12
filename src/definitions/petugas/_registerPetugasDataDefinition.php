<?php

	class RegisterPetugasDataDefinition
	{
		public string|null $nama;
		public string|null $username;
		public string|null $password;
		public string|null $id_level;

		public function __construct(string|null $nama, string|null $username, string|null $password, string|null $id_level)
		{
			$this->nama = $nama;
			$this->username = $username;
			$this->password = $password;
			$this->id_level = $id_level;
		}
	}
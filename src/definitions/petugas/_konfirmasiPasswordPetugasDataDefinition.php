<?php

	class KonfirmasiPasswordPetugasDataDefinition
	{
		public string|null $password;
		public string|null $konfirmasi_password;

		public function __construct(string|null $password, string|null $konfirmasi_password)
		{
			$this->$password = $password;
			$this->$konfirmasi_password = $konfirmasi_password;
		}
	}
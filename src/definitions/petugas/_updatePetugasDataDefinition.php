<?php


	class UpdatePetugasDataDefinition
	{
		public string|null $nama;
		public string|null $username;
		public string|null $level;
		public string|null $status;

		public function __construct(string|null $nama, string|null $username, string|null $level, string|null $status)
		{
			$this->nama = $nama;
			$this->username = $username;
			$this->level = $level;
			$this->status = $status;
		}
	}
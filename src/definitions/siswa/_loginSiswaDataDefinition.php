<?php

	class LoginSiswaDataDefinition
	{
		public string $nisn;
		public string $password;

		public function __construct(string $nisn, string $password)
		{
			$this->nisn = $nisn;
			$this->password = $password;
		}
	}
<?php

	class RoleEnumeration
	{
		const SISWA = 1;
		const PETUGAS = 2;
		const ADMINISTRATOR = 3;
		const SUPERADMINISTRATOR = 4;
	}

	class StatusEnumeration
	{
		const AKTIF = 1;
		const NONAKTIF = 0;

		public static function getStatusArray(): array
		{
			return array(
				"Aktif" => StatusEnumeration::AKTIF,
				"Nonaktif" => StatusEnumeration::NONAKTIF
			);
		}
	}
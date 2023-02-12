<?php

	class DatabaseConnection
	{
		/**
		 * Constructor for the DatabaseConnection class
		 */
		public function __construct()
		{
			require_once(dirname(__FILE__) . "/../utilities/_configuration.php");
		}


		/**
		 * Connect to the database
		 *
		 * @return mysqli
		 */
		public function connect(): mysqli
		{
			$connection = new mysqli(
				Configuration::DATABASE_HOST,
				Configuration::DATABASE_USERNAME,
				Configuration::DATABASE_PASSWORD,
				Configuration::DATABASE_NAME
			);

			if ($connection->connect_error) {
				die("Connection failed: " . $connection->connect_error);
			}

			return $connection;
		}
	}
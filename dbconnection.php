	<?php

	//DB connection
	        
	class DatabaseConnection {

			const DB_USER = 'root';
			const DB_PASSWORD = '';
			const DB_HOST = 'localhost';
			const DB_NAME = 'homedecor';

			private $dbc;

			function __construct() {
				$this->dbc = @mysqli_connect(
					self::DB_HOST,
					self::DB_USER,
					self::DB_PASSWORD,
					self::DB_NAME
				)
				OR die(
					'Could not connect to MySQL: ' . mysqli_connect_error()
				);

				mysqli_set_charset($this->dbc, 'utf8');
			}

			function prepare_string($string) {
				$string = strip_tags($string);
				$string = mysqli_real_escape_string($this->dbc, trim($string));
				return $string;
			}

			function get_dbc() {
				return $this->dbc;
			}
			
	  }
	  ?>


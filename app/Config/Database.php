<?php

namespace Config;

use CodeIgniter\Database\Config;

class Database extends Config
{
	public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;
	public string $defaultGroup = 'default';
	public array $default = [
		'DSN'      => '',

		'hostname' => 'localhost',
		'username' => 'root',
		'password' => '',
		'database' => 'com450',
		'DBDriver' => 'MySQLi',

		'DBPrefix' => '',
		'pConnect' => false,
		'DBDebug'  => true,
		'charset'  => 'utf8',
		'DBCollat' => 'utf8_general_ci',
		'swapPre'  => '',
		'encrypt'  => false,
		'compress' => false,
		'strictOn' => false,
		'failover' => [],
		'port'     => 3306,
	];
	/**
	 * This database connection is used when
	 * running PHPUnit database tests.
	 */
	public array $tests = [
		'DSN'         => '',
		'hostname'    => '127.0.0.1',
		'username'    => '',
		'password'    => '',
		'database'    => ':memory:',
		'DBDriver'    => 'SQLite3',
		'DBPrefix'    => 'db_',  // Needed to ensure we're working correctly with prefixes live. DO NOT REMOVE FOR CI DEVS
		'pConnect'    => false,
		'DBDebug'     => true,
		'charset'     => 'utf8',
		'DBCollat'    => 'utf8_general_ci',
		'swapPre'     => '',
		'encrypt'     => false,
		'compress'    => false,
		'strictOn'    => false,
		'failover'    => [],
		'port'        => 3306,
		'foreignKeys' => true,
		'busyTimeout' => 1000,
	];
	public function __construct()
	{
		parent::__construct();
		if (ENVIRONMENT === 'testing') {
			$this->defaultGroup = 'tests';
		}
	}
}

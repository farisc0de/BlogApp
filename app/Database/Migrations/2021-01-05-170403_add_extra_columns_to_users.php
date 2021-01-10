<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddExtraColumnsToUsers extends Migration
{
	public function up()
	{
		$this->forge->addColumn('users', [
			'failed_login' => [
				'type' => 'int',
			],

			'last_login' => [
				'type' => 'timestamp',
				'null' => true,
				'default' => null
			],

			'is_admin' => [
				'type' => 'boolean',
				'null' => false,
				'default' => false
			],

			'activation_hash' => [
				'type' => 'VARCHAR',
				'constraint' => '64',
				'unique' => true
			],

			'is_active' => [
				'type' => 'BOOLEAN',
				'null' => false,
				'default' => false
			],

			'reset_hash' => [
				'type' => 'VARCHAR',
				'constraint' => '64',
				'unique' => true
			],

			'reset_expires_at' => [
				'type' => 'DATETIME',
			],

			'profile_image' => [
				'type' => 'VARCHAR',
				'constraint' => '128'

			],

			'created_at' => [
				'type' => 'DATETIME',
				'null' => true,
				'default' => null
			],

			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true,
				'default' => null
			]
		]);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}

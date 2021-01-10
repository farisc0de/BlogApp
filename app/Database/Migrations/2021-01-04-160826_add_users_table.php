<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsersTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			"id" => [
				'type' => "INT",
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true
			],

			"username" => [
				'type' => 'VARCHAR',
				'constraint' => '128'
			],

			"email" => [
				'type' => 'VARCHAR',
				'constraint' => '225'
			],

			"password_hash" => [
				'type' => 'VARCHAR',
				'constraint' => '225'
			],
		]);

		$this->forge->addPrimaryKey('id')
			->addUniqueKey('email');

		$this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users');
	}
}

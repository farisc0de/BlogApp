<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPostsTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => "int",
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true
			],
			'title' => [
				'type' => 'text',
			],
			'sub_title' => [
				'type' => 'text',
			],
			'content' => [
				'type' => 'longtext'
			],
			'poster_file' => [
				'type' => 'varchar',
				'constraint' => 225,
			],
			'user_id' => [
				'type' => "int",
				'constraint' => 11,
				'unsigned' => true,
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

		$this->forge->addPrimaryKey('id')->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');

		$this->forge->createTable('posts');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('posts');
	}
}

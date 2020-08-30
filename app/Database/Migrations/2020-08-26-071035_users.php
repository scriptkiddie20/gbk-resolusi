<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$forge = \Config\Database::forge();

		// Untuk cek foreignkey
		$this->db->enableForeignKeyChecks();

		// Menambah table roles
		$forge->addField(
			[
				'id_roles' => [
					'type'           => 'INT',
					'constraint'     => 11,
					'unsigned'       => TRUE,
					'auto_increment' => TRUE,
				],
				'role' => [
					'type' => 'VARCHAR',
					'constraint' => 128
				],
				'created_at' => [
					'type' => 'DATETIME',
					'null' => TRUE
				],
				'updated_at' => [
					'type' => 'DATETIME',
					'null' => TRUE
				]
			]
		);

		$forge->addPrimaryKey('id_roles');
		$forge->createTable('roles');

		// Menambah table users
		$forge->addField(
			[
				'id_users' => [
					'type'           => 'INT',
					'constraint'     => 11,
					'unsigned'       => TRUE,
					'auto_increment' => TRUE,
				],
				'firstName' => [
					'type'           => 'VARCHAR',
					'constraint'     => 128
				],
				'lastName' => [
					'type'           => 'VARCHAR',
					'constraint'     => 128
				],
				'email' => [
					'type'           => 'VARCHAR',
					'constraint'     => 128
				],
				'image' => [
					'type'           => 'VARCHAR',
					'constraint'     => 128
				],
				'password' => [
					'type'           => 'VARCHAR',
					'constraint'     => 254
				],
				'roles_id' => [
					'type'           	=> 'INT',
					'unsigned'       	=> TRUE,
				],
				'is_active' => [
					'type'           => 'INT',
					'constraint'     => 1
				],
				'created_at' => [
					'type'     => 'DATETIME',
					'null'     => TRUE
				],
				'updated_at' => [
					'type' => 'DATETIME',
					'null' => TRUE
				]
			]
		);

		$forge->addPrimaryKey('id_users');
		$forge->addForeignKey('roles_id', 'roles', 'id_roles', 'CASCADE', 'CASCADE');
		$forge->createTable('users');

		// Menambah table menus
		$forge->addField(
			[
				'id_menus' => [
					'type'           => 'INT',
					'constraint'     => 11,
					'unsigned'       => TRUE,
					'auto_increment' => TRUE,
				],
				'menu' => [
					'type'           => 'VARCHAR',
					'constraint'     => 128,
				],
				'created_at' => [
					'type' => 'DATETIME',
					'null' => TRUE
				],
				'updated_at' => [
					'type' => 'DATETIME',
					'null' => TRUE
				]
			]
		);

		$forge->addPrimaryKey('id_menus');
		$forge->createTable('menus');

		// Menambah table sub_menus
		$forge->addField(
			[
				'id_sub_menus' => [
					'type'           => 'INT',
					'constraint'     => 11,
					'unsigned'       => TRUE,
					'auto_increment' => TRUE,
				],
				'menus_id' => [
					'type'           => 'INT',
					'constraint'     => 11,
					'unsigned' => TRUE
				],
				'title' => [
					'type' => 'VARCHAR',
					'constraint' => 128
				],
				'url' => [
					'type' => 'VARCHAR',
					'constraint' => 128
				],
				'icon' => [
					'type' => 'VARCHAR',
					'constraint' => 254
				],
				'is_active' => [
					'type' => 'INT',
					'constraint' => 1
				],
				'created_at' => [
					'type' => 'DATETIME',
					'null' => TRUE
				],
				'updated_at' => [
					'type' => 'DATETIME',
					'null' => TRUE
				]
			]
		);

		$forge->addPrimaryKey('id_sub_menus');
		$forge->addForeignKey('menus_id', 'menus', 'id_menus', 'CASCADE', 'CASCADE');
		$forge->createTable('sub_menus');

		// Menambah table access_menus
		$forge->addField(
			[
				'id_access_menus' => [
					'type'           => 'INT',
					'constraint'     => 11,
					'unsigned'       => TRUE,
					'auto_increment' => TRUE,
				],
				'roles_id' => [
					'type'           => 'INT',
					'constraint'     => 11,
					'unsigned' => TRUE
				],
				'menus_id' => [
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => TRUE
				],
				'created_at' => [
					'type' => 'DATETIME',
					'null' => TRUE
				],
				'updated_at' => [
					'type' => 'DATETIME',
					'null' => TRUE
				]
			]
		);

		$forge->addPrimaryKey('id_access_menus');
		$forge->addForeignKey('roles_id', 'roles', 'id_roles', 'CASCADE', 'CASCADE');
		$forge->addForeignKey('menus_id', 'menus', 'id_menus', 'CASCADE', 'CASCADE');
		$forge->createTable('access_menus');

		// Menambah table user_tokens
		$forge->addField(
			[
				'id_user_tokens' => [
					'type'           => 'INT',
					'constraint'     => 11,
					'unsigned'       => TRUE,
					'auto_increment' => TRUE,
				],
				'email' => [
					'type'           => 'VARCHAR',
					'constraint'     => 128,
				],
				'token' => [
					'type' => 'VARCHAR',
					'constraint' => 254,
				],
				'created_at' => [
					'type' => 'DATETIME',
					'null' => TRUE
				],
				'updated_at' => [
					'type' => 'DATETIME',
					'null' => TRUE
				]
			]
		);

		$forge->addPrimaryKey('id_user_tokens');
		$forge->createTable('user_tokens');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//drop table
		$this->forge->droptable('roles');
		$this->forge->dropTable('users');
		$this->forge->droptable('menus');
		$this->forge->droptable('sub_menus');
		$this->forge->droptable('access_menus');
		$this->forge->droptable('user_tokens');
	}
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Leads extends Migration
{
	public function up()
	{
		// create table
		$forge = \Config\Database::forge();

		$this->db->enableForeignKeyChecks();
		$leads = [
			'id_leads' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true
			],
			'karyawan_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			],
			'lead_wa' => [
				'type' => 'INT',
				'constraint' => 11,
			],
			'lead_sms' => [
				'type' => 'INT',
				'constraint' => 11,
			],
			'lead_call' => [
				'type' => 'INT',
				'constraint' => 11,
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => TRUE,
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => TRUE,
			],
		];

		$forge->addField($leads);
		$forge->addPrimaryKey('id_leads');
		$forge->addForeignKey('karyawan_id', 'karyawan', 'id_karyawan');
		$forge->createTable('leads');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		// drop table
		$this->forge->dropTable('leads');
	}
}

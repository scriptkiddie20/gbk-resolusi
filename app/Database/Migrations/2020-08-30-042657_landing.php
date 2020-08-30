<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Landing_seeder extends Migration
{
	public function up()
	{
		// Membuat table categories

		$forge = \Config\Database::forge();

		// Untuk cek foreignkey
		$this->db->enableForeignKeyChecks();

		$karyawan = [
			'id_karyawan' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE,
			],
			'nama' => [
				'type'           => 'VARCHAR',
				'constraint'     => 128,
			],
			'phone' => [
				'type'           => 'BIGINT',
				'constraint'     => 20,
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => TRUE
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => TRUE
			]
		];


		$forge->addField($karyawan);
		$forge->addPrimaryKey('id_karyawan');
		$forge->createTable('karyawan');

		$categories = [
			'id_categories' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE,
			],
			'category' => [
				'type'           => 'VARCHAR',
				'constraint'     => 128
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => TRUE
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => TRUE
			],
		];

		$forge->addField($categories);
		$forge->addPrimaryKey('id_categories');
		$forge->createTable('categories');

		$sumbers = [
			'id_sumbers' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE,
			],
			'sumber' => [
				'type'           => 'VARCHAR',
				'constraint'     => 128,
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'		     => TRUE
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'		     => TRUE
			],
		];

		$forge->addField($sumbers);
		$forge->addPrimaryKey('id_sumbers');
		$forge->createTable('sumbers');

		$type_customers = [
			'id_type_customers' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE,
			],
			'type' => [
				'type'           => 'VARCHAR',
				'constraint'     => 128,
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'			 => TRUE,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'			 => TRUE,
			],
		];

		$forge->addField($type_customers);
		$forge->addPrimaryKey('id_type_customers');
		$forge->createTable('type_customers');


		$customers = [
			'id_customers' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE,
			],
			'sumbers_id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
			],
			'type_customers_id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
			],
			'nama' => [
				'type'           => 'VARCHAR',
				'constraint'     => 128,
			],
			'phone' => [
				'type'           => 'BIGINT',
				'constraint'     => 20,
			],
			'address' => [
				'type'           => 'VARCHAR',
				'constraint'     => 254,
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'           => TRUE,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'       	 => TRUE,
			],
		];

		$forge->addField($customers);
		$forge->addPrimaryKey('id_customers');
		$forge->addForeignKey('sumbers_id', 'sumbers', 'id_sumbers', 'CASCADE', 'CASCADE');
		$forge->addForeignKey('type_customers_id', 'type_customers', 'id_type_customers', 'CASCADE', 'CASCADE');
		$forge->createTable('customers');

		$orders = [
			'id_orders' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE,
			],
			'karyawan_id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
			],
			'customers_id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
			],
			'total' => [
				'type'           => 'BIGINT',
				'constraint'     => 20
			],
			'note' => [
				'type'           => 'TEXT',
				'null'		 	 => true
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => TRUE
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => TRUE
			],
		];

		$forge->addField($orders);
		$forge->addPrimaryKey('id_orders');
		$forge->addForeignKey('karyawan_id', 'karyawan', 'id_karyawan', 'CASCADE', 'CASCADE');
		$forge->addForeignKey('customers_id', 'customers', 'id_customers', 'CASCADE', 'CASCADE');
		$forge->createTable('orders');

		$packages = [
			'id_packages' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE,
			],
			'image_packages' => [
				'type'           => 'VARCHAR',
				'constraint'     => 128,
			],
			'package' => [
				'type'           => 'VARCHAR',
				'constraint'     => 128,
			],
			'harga' => [
				'type'           => 'BIGINT',
			],
			'berat' => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'stock' => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'categories_id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
			],
			'rekomend' => [
				'type'           => 'INT',
				'constraint'     => 1,
			],
			'keterangan' => [
				'type'           => 'TEXT',
				'null'			 => TRUE,
			],
			'created_at' => [
				'type'           => 'INT',
				'null'		     => TRUE,
			],
			'updated_at' => [
				'type'           => 'INT',
				'null'		     => TRUE,
			],
		];

		$forge->addField($packages);
		$forge->addPrimaryKey('id_packages');
		$forge->addForeignKey('categories_id', 'categories', 'id_categories', 'CASCADE', 'CASCADE');
		$forge->createTable('packages');


		$products = [
			'id_products' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE,
			],
			'product' => [
				'type'           => 'VARCHAR',
				'constraint'     => 128,
			],
			'slug' => [
				'type'           => 'VARCHAR',
				'constraint'     => 254,
			],
			'categories_id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
			],
			'packages_id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
			],
			'qtypackages' => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'image_product' => [
				'type'           => 'VARCHAR',
				'constraint'     => 254,
			],
			'created_at' => [
				'type'           => 'INT',
				'null'		     => TRUE,
			],
			'updated_at' => [
				'type'           => 'INT',
				'null'		     => TRUE,
			],
		];

		$forge->addField($products);
		$forge->addPrimaryKey('id_products');
		$forge->addForeignKey('categories_id', 'categories', 'id_categories', 'CASCADE', 'CASCADE');
		$forge->addForeignKey('packages_id', 'packages', 'id_packages', 'CASCADE', 'CASCADE');
		$forge->createTable('products');


		$detail_orders = [
			'id_detail_orders' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE,
			],
			'orders_id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
			],
			'packages_id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
			],
			'qty' => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'subtotal' => [
				'type'           => 'BIGINT',
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => TRUE
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => TRUE
			],
		];

		$forge->addField($detail_orders);
		$forge->addPrimaryKey('id_detail_orders');
		$forge->addForeignKey('orders_id', 'orders', 'id_orders', 'CASCADE', 'CASCADE');
		$forge->addForeignKey('packages_id', 'packages', 'id_packages', 'CASCADE', 'CASCADE');
		$forge->createTable('detail_orders');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		// drop table
		$this->forge->dropTable('categories');
		$this->forge->dropTable('orders');
		$this->forge->dropTable('detail_orders');
		$this->forge->dropTable('customers');
		$this->forge->dropTable('sumbers');
		$this->forge->dropTable('type_customers');
		$this->forge->dropTable('packages');
		$this->forge->dropTable('products');
		$this->forge->dropTable('karyawan');
	}
}

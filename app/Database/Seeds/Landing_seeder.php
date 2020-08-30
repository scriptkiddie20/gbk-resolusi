<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Landing_seeder extends Seeder
{
	public function run()
	{
		$time = new Time();

		$karyawan = [
			[
				'nama' => 'IM',
				'phone' => 6281224711312,
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
			[
				'nama' => 'GBKSIMP',
				'phone' => 6281212609423,
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
			[
				'nama' => 'GBKM3',
				'phone' => 6285773465849,
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
			[
				'nama' => 'GBKUBM',
				'phone' => 6285776237423,
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
			[
				'nama' => 'GBKJKT',
				'phone' => 6281213468456,
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
			[
				'nama' => 'GBKSOLO',
				'phone' => 6281296211718,
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
		];

		$categories = [
			[
				'category' => 'Pakaian Anak',
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
			[
				'category' => 'Daster',
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
			[
				'category' => 'Gamis',
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
			[
				'category' => 'Kerudung',
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
			[
				'category' => 'Mukena',
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
			[
				'category' => 'Kaos Distro',
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
		];

		$sumbers = [
			[
				'sumber' => 'Web GBK Order',
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
			[
				'sumber' => 'Facebook',
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
			[
				'sumber' => 'Instagram',
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
		];

		$type_customers = [
			[
				'type' => 'Agen',
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
			[
				'type' => 'Reseller',
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
		];

		$customers = [
			'sumbers_id' => 1,
			'type_customers_id' => 2,
			'nama' => 'Aceng Gebeka',
			'phone' => 6282111230484,
			'address' => 'Cikarang',
			'created_at' => $time->toDateTimeString(),
			'updated_at' => $time->toDateTimeString(),
		];

		$orders = [
			'karyawan_id' => 1,
			'customers_id' => 1,
			'total' => 350000,
			'note' => 'Saya mau pesan 2 kang',
			'created_at' => $time->toDateTimeString(),
			'updated_at' => $time->toDateTimeString(),
		];

		$packages = [
			[
				'image_packages' => 'psa.jpg',
				'package' => 'Paket Sample Anak',
				'harga' => 350000,
				'berat' => 4,
				'stock' => 5,
				'categories_id' => 1,
				'rekomend' => 1,
				'keterangan' => 'Produknya bagus-bagus lhoo..',
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
			[
				'image_packages' => 'pma.jpg',
				'package' => 'Paket Mini Anak',
				'harga' => 1500000,
				'berat' => 15,
				'stock' => 10,
				'categories_id' => 1,
				'rekomend' => 0,
				'keterangan' => 'Cocok untuk menunjang usaha anda..',
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
			[
				'image_packages' => 'pua.jpg',
				'package' => 'Paket Usaha Anak',
				'harga' => 3500000,
				'berat' => 30,
				'stock' => 8,
				'categories_id' => 1,
				'rekomend' => 0,
				'keterangan' => 'Khusus untuk pengusaha',
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
		];

		$products = [
			[
				'product' => 'Tunik Raisa',
				'slug' => 'tunik-raisa',
				'categories_id' => 1,
				'packages_id' => 1,
				'qtypackages' => 20,
				'image_product' => 'tunikraisa.jpg',
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
			[
				'product' => 'Dress Sifon',
				'slug' => 'dress-sifon',
				'categories_id' => 1,
				'packages_id' => 2,
				'qtypackages' => 10,
				'image_product' => 'dresssifon.jpg',
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
			[
				'product' => 'Kerudung Babydoll',
				'slug' => 'kerudung-babydoll',
				'categories_id' => 1,
				'packages_id' => 3,
				'qtypackages' => 5,
				'image_product' => 'kerudungbabydoll.jpg',
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
		];

		$detail_orders = [
			'orders_id' => 1,
			'packages_id' => 1,
			'qty' => 1,
			'subtotal' => 350000,
			'created_at' => $time->toDateTimeString(),
			'updated_at' => $time->toDateTimeString(),
		];

		$this->db->table('karyawan')->insertBatch($karyawan);
		$this->db->table('categories')->insertBatch($categories);
		$this->db->table('sumbers')->insertBatch($sumbers);
		$this->db->table('type_customers')->insertBatch($type_customers);
		$this->db->table('customers')->insert($customers);
		$this->db->table('orders')->insert($orders);
		$this->db->table('packages')->insertBatch($packages);
		$this->db->table('products')->insertBatch($products);
		$this->db->table('detail_orders')->insert($detail_orders);
	}
}

<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class FirstInsert extends Seeder
{
	public function run()
	{
		$role = [
			[
				'role' => 'Admin',
				'created_at' => Time::now(),
				'updated_at' => Time::now(),
			],
			[
				'role' => 'User',
				'created_at' => Time::now(),
				'updated_at' => Time::now(),
			],
		];

		$menu = [
			[
				'menu' => 'Admin',
				'created_at' => Time::now(),
				'updated_at' => Time::now(),
			],
			[
				'menu' => 'User',
				'created_at' => Time::now(),
				'updated_at' => Time::now(),
			]
		];

		$accessMenu = [
			[
				'roles_id' 	 => 1,
				'menus_id' 	 => 1,
				'created_at' => Time::now(),
				'updated_at' => Time::now(),
			],
			[
				'roles_id' 	 => 1,
				'menus_id' 	 => 2,
				'created_at' => Time::now(),
				'updated_at' => Time::now(),
			],
			[
				'roles_id' 	 => 2,
				'menus_id' 	 => 2,
				'created_at' => Time::now(),
				'updated_at' => Time::now(),
			],
		];

		$subMenu = [
			[
				'menus_id' => 1,
				'title' => 'Dashboard',
				'url' => '/admin',
				'icon' => 'fas fa-fw fa-tachometer-alt',
				'is_active' => 1,
				'created_at' => Time::now(),
				'updated_at' => Time::now(),
			],
			[
				'menus_id' => 2,
				'title' => 'Paket Usaha',
				'url' => '/packages',
				'icon' => 'fas fa-fw fa-box-open',
				'is_active' => 1,
				'created_at' => Time::now(),
				'updated_at' => Time::now(),
			],
		];

		$this->db->table('roles')->insertBatch($role);
		$this->db->table('menus')->insertBatch($menu);
		$this->db->table('access_menus')->insertBatch($accessMenu);
		$this->db->table('sub_menus')->insertBatch($subMenu);
	}
}

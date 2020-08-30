<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Users_seeder extends Seeder
{
	public function run()
	{
		$time = new Time;
		$role = [
			[
				'role' => 'Admin',
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
			[
				'role' => 'User',
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
		];

		$menu = [
			[
				'menu' => 'Admin',
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
			[
				'menu' => 'User',
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			]
		];

		$accessMenu = [
			[
				'roles_id' 	 => 1,
				'menus_id' 	 => 1,
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
			[
				'roles_id' 	 => 1,
				'menus_id' 	 => 2,
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
			[
				'roles_id' 	 => 2,
				'menus_id' 	 => 2,
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
		];

		$subMenu = [
			[
				'menus_id' => 1,
				'title' => 'Dashboard',
				'url' => '/admin',
				'icon' => 'fas fa-fw fa-tachometer-alt',
				'is_active' => 1,
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
			[
				'menus_id' => 2,
				'title' => 'Paket Usaha',
				'url' => '/packages',
				'icon' => 'fas fa-fw fa-box-open',
				'is_active' => 1,
				'created_at' => $time->toDateTimeString(),
				'updated_at' => $time->toDateTimeString(),
			],
		];

		$this->db->table('roles')->insertBatch($role);
		$this->db->table('menus')->insertBatch($menu);
		$this->db->table('access_menus')->insertBatch($accessMenu);
		$this->db->table('sub_menus')->insertBatch($subMenu);
	}
}

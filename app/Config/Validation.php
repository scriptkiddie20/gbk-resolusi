<?php

namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $signup = [
		'firstName' => [
			'label'  => 'Nama depan',
			'rules'  => 'required',
			'errors' => [
				'required' => '{field} wajib diisi !'
			]
		],
		'lastName' => [
			'label'  => 'Nama belakang',
			'rules'  => 'required',
			'errors' => [
				'required' => '{field} wajib diisi !'
			]
		],
		'email' => [
			'label'  => 'Email',
			'rules'  => 'required|valid_email|is_unique[users.email]',
			'errors' => [
				'required' => '{field} wajib diisi !'
			]
		],
		'pass1' => [
			'label'  => 'Password',
			'rules'  => 'required|min_length[3]',
			'errors' => [
				'required' => '{field} wajib diisi !',
				'min_length' => 'Password terlalu lemah !'
			]
		],
		'pass2' => [
			'label'  => 'Password',
			'rules'  => 'required|min_length[3]|matches[pass1]',
			'errors' => [
				'required' => '{field} wajib diisi !',
				'min_length' => 'Password terlalu lemah !',
				'matches' => '{field} tidak sama. Cek kembali !'
			]
		],
	];
	public $signin = [
		'email' => [
			'label'  => 'Email',
			'rules'  => 'required|valid_email',
			'errors' => [
				'valid_email' => 'diisi dengan {field} yang valid',
				'required' => '{field} wajib diisi !'
			]
		],
		'password' => [
			'label'  => 'Password',
			'rules'  => 'required|min_length[3]',
			'errors' => [
				'required' => '{field} wajib diisi !',
				'min_length' => 'Password terlalu lemah !'
			]
		]
	];
}

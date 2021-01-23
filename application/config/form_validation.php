<?php
defined('BASEPATH') or exit('No direct script access allowed');
$config = [
	'auth/register' => [
		[
			'field' => 'name',
			'label' => 'Full Name',
			'rules' => 'required|trim'
		],
		[	
			'field' => 'email', 
			'label' => 'Email Address', 
			'rules' => 'required|valid_email|is_unique[users.email]|trim',
			['is_unique', 'This email is registered!']
		],
		[
			
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'required|matches[password_confirmation]|min_length[8]|trim'
		],
		[
			
			'field' => 'password_confirmation', 
			'label' => 'Password Confirmation', 
			'rules' => 'required|matches[password]|min_length[8]|trim'
		]
		],
	'auth/login' => [
		[
			'field' => 'email',
			'label' => 'Email Address',
			'rules' => 'required|valid_email|trim'
		]
	]
];
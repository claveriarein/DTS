<?php namespace Config;

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
		\App\Validation\UserRules::class
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
	public $users = [
        'first_name' => [
			'rules' => 'required|min_length[2]|max_length[100]',
			'label' => 'First name'
		],
        'last_name' => [
			'rules' => 'required|min_length[2]|max_length[100]',
			'label' => 'Last name'
		],
        'email_address' => [
			'rules' => 'required|min_length[5]|max_length[100]|valid_email',
			'label' => 'Email Address'
		],
        'username' => [
			'rules' => 'required|min_length[5]|max_length[100]|is_unique[lrfoims_users.username,id,{userID}]',
			'label' => 'Username'
		],
        'password' => [
			'rules' => 'required|min_length[8]|max_length[100]',
			'label' => 'Password'
		],
        'confirm_password' => [
			'rules' => 'matches[password]',
			'label' => 'Confirm Password'
		],
        'role_id' => [
			'rules' => 'required|numeric',
			'label' => 'Role',
			'errors' => [
				'numeric' => '{field} field is required.'
			]
		]    
	];

	public $roles = [
		'role_name' => [
			'rules' => 'required|min_length[3]|max_length[50]|is_unique[lrfoims_roles.role_name,id,{roleID}]',
			'label' => 'Role name',
			'errors' => [
                'is_unique' => 'Role already exist'      
            ]
		],
		'description' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Description'
		],
		'landing_page_id' => [
			'rules' => 'required',
			'label' => 'Landing Page'
		]
	];

	public $modules = [
		'module_name' => [
			'rules' => 'required|min_length[4]|max_length[50]|is_unique[modules.module_name,id,{moduleID}]',
			'label' => 'Module Name',
			'errors' => [
                'is_unique' => 'Module already exist'      
            ]
		],
		'description' => [
			'rules' => 'required|min_length[5]|max_length[50]',
			'label' => 'Description'
		]
	];

	public $permissionTypes = [
		'type' => [
			'rules' => 'required',
			'label' => 'Permission Type'
		],
		'slug' => [
			'rules' => 'required',
			'label' => 'Slug'
		]
	];

	public $permissions = [
		'module_id' => [
			'rules' => 'required|numeric',
			'label' => 'Module',
			'errors' => [
				'numeric' => '{field} is required.'
			]
		],
		'permission_type_id' => [
			'rules' => 'required|numeric',
			'label' => 'Permission Type',
			'errors' => [
				'numeric' => '{field} is required.'
			]
		],
		'permission_name' => [
			'rules' => 'required',
			'label' => 'Permission'
		],
		'slug' => [
			'rules' => 'required',
			'label' => 'Slug'
		],
		'icon' => [
			'rules' => 'required',
			'label' => 'Icon'
		]
	];

}

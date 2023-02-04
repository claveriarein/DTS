<?php
namespace App\Controllers;

use Modules\UserManagement\Models as UserManagement;
use Modules\DefectManagement\Models as DefectManagement;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];
	
	// protected $permissions = [];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
		$this->session = \Config\Services::session();
		$this->validation = \Config\Services::validation();
	}
	
	public function __construct()
	{
		$this->session = \Config\Services::session();

		$this->usersModel = new UserManagement\UsersModel();
		$this->rolesModel = new UserManagement\RolesModel();
		$this->modulesModel = new UserManagement\ModulesModel();
		$this->permissionsModel = new UserManagement\PermissionsModel();
		$this->rolePermissionsModel = new UserManagement\RolesPermissionsModel();
        $this->permissionTypesModel = new UserManagement\PermissionTypesModel();
        $this->itemsModel = new DefectManagement\ItemModel();
		$this->time = new \DateTime();
	
		helper(['form', 'link']);
	}

	protected function hasPermissionRedirect($slugs) {

		$isValidSlug = 0;
		$userPermissionView = $this->rolePermissionsModel->getSecurityPermissions(['role_permissions.role_id' => session()->get('role_id')]);
		$permissions = $this->rolePermissionsModel->getSecurityPermissions(['role_permissions.role_id' => session()->get('role_id'), 'p.slug'=> $slugs]);
		if(!empty($permissions)){
			session()->set(['userPermissionView' => $userPermissionView]);
			$isValidSlug = 1;
		}else{
			$isValidSlug = 0;
		}
		if($isValidSlug == 0 && session()->get('role_id') == null){
			header('Location: '.base_url());
			exit();
		}
		if($isValidSlug == 0){
			header('Location: '.base_url().'/'.$slugs.'/403');
			exit();
		}
	}
}

<?php namespace Modules\DashboardManagement\Controllers;

use Modules\DashboardManagement\Models as DashboardManagement;
use Modules\UserManagement\Models as UserManagement;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function index() { 
        $this->hasPermissionRedirect('dashboard');

		$data = [
			'page_title' => 'DTS | Dashboard',
			'title' => 'Dashboard',
			'view' => 'Modules\DashboardManagement\Views\dashboard\index',
		];
		return view('templates/index', $data);
	}

}

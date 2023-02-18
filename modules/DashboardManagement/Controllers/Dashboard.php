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
			'getCountOpenItems' => $this->itemsModel->getCountStatusItems(['item_status_id'=>'OPEN', 'status'=>'a'])[0],
			'getCountOngoingItems' => $this->itemsModel->getCountStatusItems(['item_status_id'=>'ONGOING', 'status'=>'a'])[0],
			'getCountOnholdItems' => $this->itemsModel->getCountStatusItems(['item_status_id'=>'ONHOLD', 'status'=>'a'])[0],
			'getCountDoneItems' => $this->itemsModel->getCountStatusItems(['item_status_id'=>'DONE', 'status'=>'a'])[0],
		];
		return view('templates/index', $data);
	}

}

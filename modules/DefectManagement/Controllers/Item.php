<?php namespace Modules\DefectManagement\Controllers;

use Modules\DefectManagement\Models as DefectManagement;
use Modules\UserManagement\Models as UserManagement;
use App\Controllers\BaseController;

class Item extends BaseController
{
	public function index() { 
        $this->hasPermissionRedirect('defect-items');

		$data = [
			'page_title' => 'DTS | Defect Items',
			'title' => 'Defect Items',
			'view' => 'Modules\DefectManagement\Views\items\index',
			'getAllItems' => $this->itemsModel->getAllItems([
				'defect_items.status' => 'a',
			], 1),
			'getAllItemsNotAssigned' => $this->itemsModel->getAllItems([
				'defect_items.assignee_id' => "", 
				'defect_items.severity_id' => "", 
				'defect_items.item_status_id' => "",
				'defect_items.status' => 'a'
			]),
		];
		return view('templates/index', $data);
	}

	public function tasks($offset = 0) { 
        $this->hasPermissionRedirect('defect-items');

		$data = [
			'page_title' => 'DTS | Task List',
			'title' => 'Task List',
			'view' => 'Modules\DefectManagement\Views\addtask\tasks',
			'getUsers' => $this->usersModel->get(['status' => 'a']),
			'getAllItemsForOption' => $this->itemsModel->getAllItemsForOption(['status' => 'a']),
			'getAllItemsPerItemStatusOpen' => $this->itemsModel->getAllItems([
				'defect_items.status' => 'a',
				'defect_items.item_status_id' => 'OPEN',
			]),'getAllItemsPerItemStatusOngoing' => $this->itemsModel->getAllItems([
				'defect_items.status' => 'a',
				'defect_items.item_status_id' => 'ONGOING',
			]),'getAllItemsPerItemStatusOnhold' => $this->itemsModel->getAllItems([
				'defect_items.status' => 'a',
				'defect_items.item_status_id' => 'ONHOLD',
			]),'getAllItemsPerItemStatusDone' => $this->itemsModel->getAllItems([
				'defect_items.status' => 'a',
				'defect_items.item_status_id' => 'DONE',
			]),
		];
		return view('templates/index', $data);
	}
}

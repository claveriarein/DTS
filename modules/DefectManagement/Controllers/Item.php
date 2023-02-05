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
		];
		return view('templates/index', $data);
	}
	
	public function defectItemViewReload() { 
		$data = [
			'getAllItems' => $this->itemsModel->getAllItems([
				'defect_items.assignee_id' => "", 
				'defect_items.severity_id' => "NOT_STARTED",
				'defect_items.status' => 'a',
			]),
		];
		return view('Modules\DefectManagement\Views\items\itemsView', $data);
	}

	public function tasks() { 
        $this->hasPermissionRedirect('defect-items/tasks');

		$data = [
			'page_title' => 'DTS | Task List',
			'title' => 'Task List',
			'view' => 'Modules\DefectManagement\Views\addtask\tasks',
		];
		return view('templates/index', $data);
	}
	
	public function itemTaskListViewReload() { 
		$data = [
			'getUsers' => $this->usersModel->getDetailsForSelectOption([
				'users.status' => 'a'
			]),
			'getAllItemsForOption' => $this->itemsModel->getAllItemsForOption([
				'assignee_id' => "", 
				'severity_id' => "", 
				'item_status_id' => "",
				'status' => 'a'
			]),
			'getAllItemsPerItemStatus' => $this->itemsModel->getAllItems([
				'defect_items.status' => 'a',
			], 2),
		];
		return view('Modules\DefectManagement\Views\addtask\tasksView', $data);
	}

	public function addNewItem() { 
        $this->hasPermissionRedirect('defect-items/a');

		function random_string($length) {
			$key = '';
			$keys = range(0, 9);
			for ($i = 0; $i < $length; $i++) {
				$key .= $keys[array_rand($keys)];
			}
			return $key;
		}

		$itemCodeIsTrue = $this->itemsModel->generateItemCode();
		if(!empty($itemCodeIsTrue)){
			$itemCode = $this->itemsModel->generateItemCode()[0];
		}else{
			$itemCode['item_code'] = random_string(4);
		}

		if ($this->request->getMethod() == 'post') {
			if (!$this->validate('defect_item')) {
				$data['errors'] = $this->validation->getErrors();
				$data['value'] = $_POST;
				if($_POST['title'] == "" && $_POST['description'] == ""){
					$data =[
						'title_and_description' => '',
						'status' => 'Failed!',
						'status_text' => 'Title & Description fields is required!',
						'status_icon' => 'error'
					];
					return $this->response->setJSON($data);
				} elseif($_POST['description'] == "") {
					$data =[
						'description' => '',
						'status' => 'Failed!',
						'status_text' => 'Description field is required!',
						'status_icon' => 'error'
					];
					return $this->response->setJSON($data);
				} else {
					$data =[
						'title' => '',
						'status' => 'Failed!',
						'status_text' => 'Title field is required!',
						'status_icon' => 'error'
					];
					return $this->response->setJSON($data);
				}
			} else {
				$item_data =[
					'item_code' => "IC".$itemCode['item_code'],
					'title' => $_POST['title'],
					'description' => $_POST['description'],
					'reporter_id' => $_SESSION['id'],
					'severity_id' => '',
				];
				$this->itemsModel->add($item_data);
				$data =[
					'status' => 'Success!',
					'status_text' => 'Successfully added!',
					'status_icon' => 'success'
				];
				return $this->response->setJSON($data);
			}
		}
	}
	
	public function editNewItem($id) { 
        $this->hasPermissionRedirect('defect-items/u');

		if ($this->request->getMethod() == 'post') {
			if (!$this->validate('defect_item')) {
				$data['errors'] = $this->validation->getErrors();
				$data['value'] = $_POST;
				if($_POST['title'] == "" && $_POST['description'] == ""){
					$data =[
						'title_and_description' => '',
						'status' => 'Failed!',
						'status_text' => 'Title & Description fields is required!',
						'status_icon' => 'error'
					];
					return $this->response->setJSON($data);
				} elseif($_POST['description'] == "") {
					$data =[
						'description' => '',
						'status' => 'Failed!',
						'status_text' => 'Description field is required!',
						'status_icon' => 'error'
					];
					return $this->response->setJSON($data);
				} else {
					$data =[
						'title' => '',
						'status' => 'Failed!',
						'status_text' => 'Title field is required!',
						'status_icon' => 'error'
					];
					return $this->response->setJSON($data);
				}
			} else {
				$item_data =[
					'title' => $_POST['title'],
					'description' => $_POST['description'],
				];
				$this->itemsModel->update($id, $item_data);
				$data =[
					'status' => 'Success!',
					'status_text' => 'Successfully updated!',
					'status_icon' => 'success'
				];
				return $this->response->setJSON($data);
			}
		}
	}
	
	public function editTaskStatus($id) { 
        $this->hasPermissionRedirect('defect-items/tasks/u');

		if ($this->request->getMethod() == 'post') {
			$item_data =[
				'item_status_id' => (!empty($_POST['item_status_id'])? $_POST['item_status_id'] : "OPEN"),
				'assignee_id' => (!empty($_POST['assignee_id'])? $_POST['assignee_id'] : 0),
				'severity_id' => (!empty($_POST['severity_id'])? $_POST['severity_id'] : "NOT_STARTED"),
				'start_at' => (!empty($_POST['start_at'])? $_POST['start_at'] : NULL),
				'end_at' => ($_POST['item_status_id'] == "DONE" ? $this->time->format('Y-m-d') : NULL),
			];
			$this->itemsModel->update($id, $item_data);
			$data =[
				'status' => 'Success!',
				'status_text' => 'Successfully updated!',
				'status_icon' => 'success'
			];
			return $this->response->setJSON($data);
		}
	}

    public function delete($id) {
        $this->hasPermissionRedirect('defect-items/d');

        $this->itemsModel->softDelete($id);
        $data =[
            'status'=> 'Sucess!',
            'status_text' => 'Successfully Deleted!',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
}

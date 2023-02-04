<?php namespace Modules\UserManagement\Controllers;

use Modules\UserManagement\Models as UserManagement;
use App\Controllers\BaseController;

class Permissions extends BaseController
{
    public function index() {
        $this->hasPermissionRedirect('permissions');

        $data = [
            'page_title' => 'DTS | Permissions',
            'title' => 'Permissions',
            'action' => 'Add Permission',
            'view' => 'Modules\UserManagement\Views\Permissions\index',
            'permissions' => $this->permissionsModel->getDetails()
        ];
        
        return view('templates/index',$data);
    }

    public function add() {
        $this->hasPermissionRedirect('permissions/a');

        $data = [
            'page_title' => 'DTS | Permissions',
            'title' => 'Permissions',
            'action' => 'Submit',
            'view' => 'Modules\UserManagement\Views\Permissions\form',
            'edit' => false,
            'modules' => $this->modulesModel->get(),
            'permissionTypes' => $this->permissionTypesModel->get()
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('permissions')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } 
            else {
                $this->permissionsModel->add($_POST);
                $this->session->setFlashdata('success', 'Permission Successfully Added.');
                return redirect()->to('/permissions');
            }
        }

        return view('templates/index',$data);
    }

    public function edit($id){
        $this->hasPermissionRedirect('permissions/u');

        $data = [
            'page_title' => 'DTS | Permissions',
            'title' => 'Permissions',
            'action' => 'Submit',
            'view' => 'Modules\UserManagement\Views\Permissions\form',
            'edit' => true,
            'id' => $id,
            'modules' => $this->modulesModel->get(),
            'permissionTypes' => $this->permissionTypesModel->get(),
            'value'=> $this->permissionsModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('permissions')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->permissionsModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Permission Successfully Updated.');
                return redirect()->to('/permissions');
            }
        }
        return view('templates/index',$data);
    }
    
    public function delete($id) {
        $this->hasPermissionRedirect('permissions/d');

        if($this->permissionsModel->softDelete($id)){
            $data =[
            'status' => 'Deleted Successfully',
            'status_text' => 'Successfully deleted!',
            'status_icon' => 'success'
            ];
        } else{
            $data =[
            'status' => 'Oops!',
            'status_text' => 'Something went wrong!',
            'status_icon' => 'warning'
            ];
        }
        return $this->response->setJSON($data);
    }
}

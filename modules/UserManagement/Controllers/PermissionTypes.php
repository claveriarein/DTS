<?php namespace Modules\UserManagement\Controllers;

use Modules\UserManagement\Models as UserManagement;
use App\Controllers\BaseController;

class PermissionTypes extends BaseController
{
    public function index() {
        $this->hasPermissionRedirect('permission-types');

        $data = [
            'page_title' => 'DTS | Permission Types',
            'title' => 'Permission Types',
            'action' => 'Add PermissionType',
            'view' => 'Modules\UserManagement\Views\PermissionTypes\index',
            'permissionTypes' => $this->permissionTypesModel->get()
        ];
        
        return view('templates/index',$data);
    }

    public function add() {
        $this->hasPermissionRedirect('permission-types/a');

        $data = [
            'page_title' => 'DTS | Permission Types',
            'title' => 'Permission Types',
            'action' => 'Submit',
            'view' => 'Modules\UserManagement\Views\PermissionTypes\form',
            'edit' => false,
            'modules' => $this->modulesModel->get()
        ];

        if ($this->request->getMethod() == 'post') {
            // die(print_r($_POST));
            if (!$this->validate('permissionTypes')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } 
            else {
                $this->permissionTypesModel->add($_POST);
                $this->session->setFlashdata('success', 'Permission Type Successfully Added.');
                return redirect()->to('/permission-types');
            }
        }

        return view('templates/index',$data);
    }

    public function edit($id) {
        $this->hasPermissionRedirect('permission-types/u');

        $data = [
            'page_title' => 'DTS | Permission Types',
            'title' => 'Permission Types',
            'action' => 'Submit',
            'view' => 'Modules\UserManagement\Views\PermissionTypes\form',
            'edit' => true,
            'id' => $id,
            'modules' => $this->modulesModel->get(),
            'value'=> $this->permissionTypesModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('permissionTypes')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->permissionTypesModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Permission Type Successfully Updated.');
                return redirect()->to('/permission-types');
            }
        }
        return view('templates/index',$data);
    }
    
    public function delete($id) {
        $this->hasPermissionRedirect('permission-types/d');

        if($this->permissionTypesModel->softDelete($id)){
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

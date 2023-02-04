<?php namespace Modules\UserManagement\Controllers;

use Modules\UserManagement\Models as UserManagement;
use App\Controllers\BaseController;

class Roles extends BaseController
{
    public function index() {
        $this->hasPermissionRedirect('roles');

        $data = [
            'page_title' => 'DTS | Roles',
            'title' => 'Roles',
            'action' => 'Add Role',
            'view' => 'Modules\UserManagement\Views\Roles\index',
            'roles' => $this->rolesModel->getDetails()
        ];

        return view('templates/index',$data);
    }

    public function add() {
        $this->hasPermissionRedirect('roles/a');

        $data = [
            'page_title' => 'DTS | Roles',
            'title' => 'Roles',
            'action' => 'Submit',
            'edit' => false,
            'view' => 'Modules\UserManagement\Views\Roles\form',
            'permissions' => $this->permissionsModel->get(['permission_type_id'=> 5,'status' => 'a']),
            'modules' => $this->modulesModel->get(['status' => 'a'])
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('roles')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->rolesModel->add($_POST);
                $this->session->setFlashdata('success', 'Successfully Added.');
                return redirect()->to('/roles');
            }
        }

        return view('templates/index',$data);
    }

    public function edit($id) {
        $this->hasPermissionRedirect('roles/u');

        $data = [
            'page_title' => 'DTS | Roles',
            'title' => 'Roles',
            'action' => 'Submit',
            'view' => 'Modules\UserManagement\Views\Roles\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->rolesModel->get(['id' => $id])[0],
            'permissions' => $this->permissionsModel->get(['permission_type_id'=> 5,'status' => 'a']),
            'modules' => $this->modulesModel->get(['status' => 'a'])
        ];
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('roles')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->rolesModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Successfully Updated.');
                return redirect()->to('/roles');
            }
        }
        return view('templates/index',$data);
    }

    public function delete($id) {
        $this->hasPermissionRedirect('roles/d');

        $this->rolesModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
}

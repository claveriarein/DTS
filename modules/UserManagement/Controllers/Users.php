<?php namespace Modules\UserManagement\Controllers;

use Modules\UserManagement\Models as UserManagement;
use App\Controllers\BaseController;

class Users extends BaseController
{
    public function index() {
        $this->hasPermissionRedirect('users');

        $data = [
            'page_title' => 'DTS | Users',
            'title' => 'Users',
            'view' => 'Modules\UserManagement\Views\Users\index',
            'users' => $this->usersModel->getDetails(['users.status' => 'a', 'users.email_address' => false])
        ];
        
        return view('templates/index',$data);
    }

    public function add() {
        $this->hasPermissionRedirect('users/a');

        $data = [
            'page_title' => 'DTS | Users',
            'title' => 'Users',
            'action' => 'Submit',
            'view' => 'Modules\UserManagement\Views\Users\form',
            'edit' => false,
            'roles' => $this->rolesModel->get(),
        ];

        
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('users')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->usersModel->add($_POST);
                $this->session->setFlashdata('success', 'User successfully added!');
                return redirect()->to('/users');
            }
        }

        return view('templates/index',$data);
    }

    public function edit($id) {
        $this->hasPermissionRedirect('users/u');

        $data = [
            'page_title' => 'DTS | Users',
            'title' => 'User',
            'action' => 'Submit',
            'view' => 'Modules\UserManagement\Views\Users\form',
            'edit' => true,
            'id' => $id,
            'roles' => $this->rolesModel->get(),
            'value' => $this->usersModel->get(['id' => $id])[0]
        ];

        if(empty($data['value'])){
            die('Some Error Code Here (No Record)');
        }

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('users')) {
                $data['value'] = $_POST;
                $data['errors'] = $this->validation->getErrors();
            } else {
                $this->usersModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Record Succesfully Updated');
                return redirect()->to('/users');
            }
        }
        return view('templates/index', $data);
    }

    public function delete($id) {
        $this->hasPermissionRedirect('users/d');

        $this->usersModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }

    public function view($id) {
        $this->hasPermissionRedirect('users/v');

        $data = [
            'page_title' => 'DTS | Profile',
            'title' => 'Profile',
            'action' => 'Profile',
            'view' => 'Modules\UserManagement\Views\Users\viewUser',
            'users' => $this->usersModel->getDetails(['users.id' => $id, 'users.status' => 'a'])
        ];
        return view('templates/index', $data);
    }
}

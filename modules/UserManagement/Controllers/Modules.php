<?php namespace Modules\UserManagement\Controllers;

use Modules\UserManagement\Models as UserManagement;
use App\Controllers\BaseController;

class Modules extends BaseController
{
    public function index() {
        $this->hasPermissionRedirect('modules');
        
        $data = [
            'page_title' => 'DTS | Modules',
            'title' => 'Modules',
            'action' => 'Add Module',
            'view' => 'Modules\UserManagement\Views\Modules\index',
            'modules' => $this->modulesModel->get()
        ];
        
        return view('templates/index',$data);
    }

    public function add() {
        $this->hasPermissionRedirect('modules/a');

        $data = [
            'page_title' => 'DTS | Modules',
            'title' => 'Modules',
            'action' => 'Submit',
            'view' => 'Modules\UserManagement\Views\Modules\form',
            'edit' => false
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('modules')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->modulesModel->add($_POST);
                $this->session->setFlashdata('success', 'Successfully Added');
                return redirect()->to('/modules');
            }
        }

        return view('templates/index',$data);
    }

    public function edit($id) {
        $this->hasPermissionRedirect('modules/u');

        $data = [
            'page_title' => 'DTS | Modules',
            'title' => 'Modules',
            'action' => 'Submit',
            'view' => 'Modules\UserManagement\Views\Modules\form',
            'edit' => true,
            'id' => $id,
            'value' => $this->modulesModel->get(['id' => $id])[0]
        ];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('modules')) {
                $data['errors'] = $this->validation->getErrors();
                $data['value'] = $_POST;
            } else {
                $this->modulesModel->update($id, $_POST);
                $this->session->setFlashdata('success', 'Successfully Updated');
                return redirect()->to('/modules');
            }
        }

        return view('templates/index',$data);
    }

    public function delete($id) {
        $this->hasPermissionRedirect('modules/d');

        $this->modulesModel->softDelete($id);
        $data =[
            'status'=> 'Deleted Successfully',
            'status_text' => 'Record Successfully Deleted',
            'status_icon' => 'success'
        ];
        return $this->response->setJSON($data);
    }
}

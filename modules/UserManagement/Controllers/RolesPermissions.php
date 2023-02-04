<?php namespace Modules\UserManagement\Controllers;

use Modules\UserManagement\Models as UserManagement;
use App\Controllers\BaseController;

class RolesPermissions extends BaseController
{
  public function index() {
    $this->hasPermissionRedirect('role-permissions');

    $data = [
        'page_title' => 'DTS | Roles Permissions',
        'title' => 'Roles Permissions',
        'view' => 'Modules\UserManagement\Views\RolesPermissions\index',
        'roles' => $this->rolesModel->get(),
        'rolesPermissions' => $this->rolePermissionsModel->getDetails(),
        'permissions' => $this->permissionsModel->get(),
        'modules' => $this->modulesModel->get(),
    ];
    
    return view('templates/index',$data);
  }

  public function edit($id){
    $this->hasPermissionRedirect('role-permissions/u');

    $data['page_title'] = 'DTS | Roles Permissions';
    $data['title'] = 'Roles Permissions';
    $data['action'] = 'Submit';
    $data['edit'] = true;
    $data['view'] = 'Modules\UserManagement\Views\RolesPermissions\form';
    $data['id'] = $id;
    $data['roles'] = $this->rolesModel->get();
    $data['modules'] = $this->modulesModel->get();
    $data['permissions'] = $this->permissionsModel->get();
    $data['role_permissions'] = $this->rolePermissionsModel->getDetails(['r.id' => $id]);

    $data['value'] = $this->rolesModel->get(['id' => $id])[0];
    if(empty($data['value'])){
      die('Some Error Code Here (No Record)');
    }

    if($this->request->getMethod() === 'post'){
        if ($this->rolePermissionsModel->softDeleteByRoleId($id)) {
          if(!empty($_POST['permission_id'])){
            foreach ($_POST['permission_id'] as $key => $value) {
              $permission = $this->rolePermissionsModel->get(['role_id' => $id, 'permission_id' => $value]);
              if (!empty($permission)) {
                $this->rolePermissionsModel->EditByModuleId(['deleted_at' => null],$value);
              } else {
                $this->rolePermissionsModel->add(['role_id' => $id, 'permission_id' => $value]);
              }
            }
          }
          $this->session->setFlashData('success', 'Successfully edit permission roles!');
        } else {
          $this->session->setFlashData('error', 'Something went wrong!');
        }
        return redirect()->to(base_url('role-permissions'));
    }
    return view('templates/index', $data);
  }

  public function retrieve(){
    $data['own_permissions'] = $this->rolePermissionsModel->getPermissions(['role_permissions.role_id' => $_GET['id']]);
    $data['permission_types'] = $this->rolePermissionsModel->getPermissionsTypes(['role_permissions.role_id' => $_GET['id']]);
    $data['modules'] = $this->rolePermissionsModel->getModules(['role_permissions.role_id' => $_GET['id']]);
    return view('Modules\UserManagement\Views\RolesPermissions\permissions', $data);
  }
}

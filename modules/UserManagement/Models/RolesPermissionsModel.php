<?php

namespace Modules\UserManagement\Models;

use App\Models\BaseModel;

class RolesPermissionsModel extends BaseModel
{
  protected $table = 'role_permissions';
  protected $allowedFields = [
      'role_id',
      'permission_id',
      'created_at', 
      'updated_at', 
      'deleted_at'
  ];

  public function getDetails($conditions = []) {
    $this->select('role_permissions.*, p.permission_name, r.role_name');
    $this->join('permissions as p', 'p.id = role_permissions.permission_id');
    $this->join('roles as r', 'r.id = role_permissions.role_id');
    foreach($conditions as $field => $value){
        $this->where([$field => $value]);
    }
    return $this->findAll();
  }
    
  public function getSecurityPermissions($conditions = []) {
      $this->select('role_permissions.*, p.slug');
      $this->join('permissions as p', 'p.id = role_permissions.permission_id');
      $this->join('modules as m', 'm.id = p.module_id');
      foreach($conditions as $field => $value){
          $this->where($field, $value);
      }
      return $this->findAll();
  } 

  public function getPermissionsTypes($conditions = []) {
    $this->select('pt.type, pt.slug as type_slug, pt.id as type_id');
    $this->join('permissions as p', 'p.id = role_permissions.permission_id');
    $this->join('permission_types as pt', 'pt.id = p.permission_type_id');
    foreach ($conditions as $condition => $value) {
      $this->where($condition , $value);
    }
    $this->groupBy('pt.id');
    return $this->findAll();
  }

  public function getModules($conditions = []) {
    $this->select('m.id as module_id, m.module_name, p.permission_type_id, p.slug, p.icon, p.id');
    $this->join('permissions as p', 'p.id = role_permissions.permission_id');
    $this->join('modules as m', 'm.id = p.module_id');
    foreach ($conditions as $condition => $value) {
      $this->where($condition , $value);
    }
    $this->groupBy('m.id');
    $this->orderBy('m.id', 'ASC');
    return $this->findAll();
  }

  public function getPermissions($conditions = []) {
    $this->select('p.id, p.permission_name, p.module_id, p.permission_type_id, p.slug, p.icon');
    $this->join('permissions as p', 'p.id = role_permissions.permission_id');
    foreach ($conditions as $condition => $value) {
      $this->where($condition , $value);
    }
    $this->groupBy('p.id');
    $this->orderBy('p.id', 'ASC');
    return $this->findAll();
  }

  public function softDeleteByRoleId($id){
    return $this->where('role_id', $id)->delete();
  }
  
  public function EditByModuleId($data, $id){
    return $this->update(['module_id' => $id], $data);
  }

}

<?php namespace Modules\UserManagement\Models;

use App\Models\BaseModel;

class PermissionsModel extends BaseModel
{
    protected $table = 'permissions';
    protected $allowedFields = [
        'module_id',
        'permission_name',
        'permission_type_id',
        'slug',
        'icon',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getDetails($conditions = [])
    {
        $this->select('permissions.*, m.module_name, t.type');
        $this->join('modules as m', 'm.id = permissions.module_id');
        $this->join('permission_types as t', 't.id = permissions.permission_type_id');
        
        foreach($conditions as $field => $value){
            $this->where($field, $value);
        }

        return $this->findAll();
    }

    public function getPermissionsTypes($conditions = []){
        $this->select('p.id, p.permission_name, p.module_id, p.permission_type, p.slug');
        $this->join('permissions as p', 'p.id = role_permissions.permission_id');
        foreach ($conditions as $condition => $value) {
          $this->where($condition , $value);
        }
        return $this->findAll();
      }

}

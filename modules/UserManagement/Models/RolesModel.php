<?php namespace Modules\UserManagement\Models;

use App\Models\BaseModel;

class RolesModel extends BaseModel
{
    protected $table = 'roles';
    protected $allowedFields = [
        'role_name', 
        'description',
        'landing_page_id', 
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];
    
    public function getDetails($condition = []) {
        $this->select('roles.*, permissions.permission_name');
        $this->join('permissions', ' roles.landing_page_id = permissions.id');
        
        foreach($condition as $field => $value){
            $this->where($field, $value);
        }

        return $this->findAll();  
    }
}

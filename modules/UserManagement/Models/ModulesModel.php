<?php namespace Modules\UserManagement\Models;

use App\Models\BaseModel;

class ModulesModel extends BaseModel
{
    protected $table = 'modules';
    protected $allowedFields = [
        'module_name', 
        'description',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];
}

<?php

namespace Modules\UserManagement\Models;

use App\Models\BaseModel;

class UsersModel extends BaseModel
{
    protected $table = 'users';
    protected $allowedFields = [
        'role_id', 
        'first_name',
        'last_name',
        'email_address',
        'username', 
        'password', 
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data) {
        $data = $this->passwordHash($data);

        return $data;
    }

    protected function beforeUpdate(array $data) {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function passwordHash(array $data) {
        if (isset($data['data']['password']))
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

        return $data;
    }

    public function getDetailsForSelectOption($condition = []) {
        $this->select('users.first_name, users.last_name, users.id, roles.role_name, users.role_id');
        $this->join('roles', ' roles.id = users.role_id');
        
        foreach($condition as $field => $value){
            $this->where($field, $value);
        }

        return $this->findAll();  
    }
    
    public function getUserList($condition = []) {
        $this->select('users.first_name, users.last_name, users.id, roles.role_name, users.role_id');
        $this->join('roles', ' roles.id = users.role_id');
        
        foreach($condition as $field => $value){
            $this->where($field, $value);
        }

        return $this->findAll();  
    }

    public function getDetails($condition = []) {
        $this->select('users.*, roles.role_name, permissions.slug');
        $this->join('roles', ' roles.id = users.role_id');
        $this->join('permissions', ' roles.landing_page_id = permissions.id');
        
        foreach($condition as $field => $value){
            $this->where($field, $value);
        }

        return $this->findAll();  
    }

    public function getUserData() {
        $this->select('count(id) as user');
        return $this->findAll();
    }

    public function getTotalUsers($conditions = []) {

        $this->select('users.*, COUNT(users.id) as getTotalUsers');

        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }

        return $this->findAll();
    }
}

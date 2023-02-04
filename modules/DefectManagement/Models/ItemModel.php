<?php namespace Modules\DefectManagement\Models;

use App\Models\BaseModel;

class ItemModel extends BaseModel
{
    protected $table = 'defect_items';
    protected $allowedFields = [
        'item_code',
        'title',
        'description',
        'reporter_id',
        'item_status_id',
        'assignee_id',
        'severity_id',
        'start_at',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'];
        
    public function getAllItems($conditions = [], $assignee = null){

        $this->select('defect_items.item_code, defect_items.description, defect_items.created_at,
            defect_items.item_status_id, defect_items.severity_id, defect_items.title, defect_items.start_at,
            uReporter.first_name as r_first_name, uAssignee.first_name as a_first_name');
        $this->join('users as uReporter','uReporter.id = defect_items.reporter_id', 'left');
        $this->join('users as uAssignee','uAssignee.id = defect_items.assignee_id', 'left');
        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        if($assignee == 1){
            $this->whereIn('defect_items.item_status_id', ['OPEN', 'ONGOING', 'ONHOLD', 'DONE']);
        }

        return $this->findAll();
    }    

    public function getAllItemsForOption($conditions = []){

        $this->select('item_code, id, title, description');
        foreach($conditions as $field => $value){
            $this->where([$field => $value]);
        }
        return $this->findAll();
    }
}

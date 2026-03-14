<?php
namespace App\Models;

use CodeIgniter\Model;

class Mymodel extends Model
{

    public function insert_data($table, $data)
    {
        $q = $this->db->table($table)->insert($data);
        if ($q) {
            return $this->db->insertID();
        }
    }

    public function select_one($select, $table, $where = false){
        $builder = $this->db->table($table);
        $builder->select('*');
        if ($where) {
            $builder->where($where);
        }
        $query = $builder->get();        
        return $query->getRow();
    }

   
    public function select_data($table, $where = [])
    {
        $builder = $this->db->table($table);
        $builder->select('*');       
        if (!empty($where)) {
            $builder->where($where);
        }
        
        $builder->orderBy('id', 'DESC'); 
        
        $query = $builder->get();
        
        return $query->getResult();
    }

    public function select_all($select, $table, $where = [])
    {
        $builder = $this->db->table($table);
        $builder->select($select);       
        if (!empty($where)) {
            $builder->where($where);
        }
        
        $builder->orderBy('id', 'DESC'); 
        
        $query = $builder->get();
        
        return $query->getResult();
    }



    public function update_data($table, $data, $where)
    {
        $builder = $this->db->table($table);
        $builder->where($where);
        return $builder->update($data);
    }

    public function select_array($select, $table, $limit = null) {
         $builder = $this->db->table($table);
         $builder->select($select);
         $builder->orderBy('id', 'DESC');
         if($limit) $builder->limit($limit);
         return $builder->get()->getResultArray();
    }



    // 7. Get Assignment History (Joins Users)
    public function get_assign_history($lead_id) {
        $builder = $this->db->table('lead_assign_history');
        $builder->select('lead_assign_history.*, u_to.user_name as to_name, u_from.user_name as from_name');
        $builder->join('users as u_to', 'u_to.id = lead_assign_history.assign_to', 'left');
        $builder->join('users as u_from', 'u_from.id = lead_assign_history.assign_form', 'left');
        $builder->where('lead_assign_history.lead_id', $lead_id);
        $builder->orderBy('date_time', 'DESC');
        return $builder->get()->getResult();
    }



    public function join_tables($select, $table, $joinqry, $where, $multiple = true, $order_by =false, $limit_row = false, $group_by = false, $havingCond = false){
        
        $builder = $this->db->table($table);
        $builder->select($select);
        foreach($joinqry as $jq){
            $builder->join($jq[0], $jq[1], $jq[2]);
        }
        // if(is_array($where)){
        //     foreach($where as $wr){
        //         if(is_array($wr)){
        //             $builder->whereIn($where);
        //         }else{
        //             $builder->where($where);
        //         }                
        //     }
        // }
        if(!empty($where)){
            $builder->where($where);
        }
        else{
            $builder->where($where);
        }
        if($order_by){$builder->orderBy($order_by[0], $order_by[1]);}
        if($limit_row){$builder->limit($limit_row[0], $limit_row[1]);}        
        if($group_by){$builder->groupBy($group_by);}        
        if($havingCond){$builder->having($havingCond);}  
        
        if($multiple){
            return $builder->get()->getResult();
        }else{
            return $builder->get()->getRow();
        }
    }
    

    // public function delete_data($table, $where)
    // {
    //     return $this->db->table($table)->where($where)->delete();
    // }
}
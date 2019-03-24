<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

    public function auth_user($username){
        $this->db->select("*");
        $this->db->from('tbl_users');
        $this->db->where('username',$username);
        $query = $this->db->get();
        return $query->row();
    }

    public function getRows($table,$select="*",$where=array(),$join=array(),$order_by = "",$limit = 0,$result = 'array'){
        $this->db->select($select);

        if(!empty($where))
            $this->db->where($where);

        if(!empty($join))
            foreach($join as $key => $value){
                $this->db->join($key,$value);
            }

        if(!empty($order_by))
            $this->db->order_by($order_by);

        if(!empty($limit))
            $this->db->limit($limit);

        $query = $this->db->get($table);

        switch ($result) {
            case 'array':
                return $query->result_array();
                break;
            case 'row':
                return $query->row();
                break;
            case 'count':
                return $query->num_rows();
                break;
            default:
                return $query->result_array();
                break;
        }
    }

    public function insert($table,$data = array()){
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }

    public function update($table,$data = array(),$where = array()){
        $this->db->where($where);
        $this->db->update($table,$data);
        return true;
    }

}

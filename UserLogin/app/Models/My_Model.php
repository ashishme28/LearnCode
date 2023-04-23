<?php
namespace App\Models;

use CodeIgniter\Model;
use Exception;

class My_Model extends Model {
	public function __construct(){
		$this->db = \Config\Database::connect();
	}

	public function InsertData($table,$data) {
	    //echo $table; print_r($data);
	    $builder = $this->db->table($table);
	     if($builder->insert($data)){
	      return $this->db->insertID();
	    } else {
	      return false;
	    }
  	}

  	public function GetSingleData($table,$where=null,$ob=null,$obc='desc'){
	    $builder = $this->db->table($table);
	    if($where) {
	      $builder->where($where);
	    }
	    if($ob) {
	      $builder->orderBy($ob,$obc);
	    }
	    $query = $builder->get();
	        if ($query->getRow()) {
	           
	          return $query->getRowArray();
	        }else{
	            return array();
	        }
    }

    public function GetAllData($table,$where=null,$ob=null,$obc='desc'){
	    $builder = $this->db->table($table);
	    if($where) {
	      $builder->where($where);
	    }
	    if($ob) {
	      $builder->orderBy($ob,$obc);
	    }
	    $query = $builder->get();
	        if ($query->getRow()) {
	           
	          return $query->getResultArray();
	        }else{
	            return array();
	        }
    }

    public function UpdateData($table,$where,$data){
	    $builder = $this->db->table($table);
	    $builder->where($where);
	    $builder->update($data);
	    return ($this->db->affectedRows() > 0)?true:true;
    }
}


?>
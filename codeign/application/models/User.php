<?php

class User extends CI_Model {

public function getAdmin($tabel)
{
  $res = $this->db->get($tabel);

  return $res->result_array();
}

function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	
}
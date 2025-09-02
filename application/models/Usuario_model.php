<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model 
{
	public function __construct() 
	{
	    parent::__construct();
	}

	public function recuperaUsuarios()
	{
		$query = $this->db->get('usuarios', 10);
        return $query->result();
	}

	public function recuperaUsuario($id)
	{
		$query = $this->db->get_where('usuarios',['id'=> $id])->row();
        return $query;
	}

	public function incluiUsuario($data)
	{
		$ok = $this->db->insert('usuarios', $data);
        return $ok;
	}

	public function alterarUsuarios($id, $data)
	{
		$this->db->where('id', $id);
        $ok = $this->db->update('usuarios', $data);
        return $ok;
	}

	public function excluirUsuario($id)
	{
		$ok = $this->db->delete('usuarios',['id'=> $id]);
		return $ok;
	}

}
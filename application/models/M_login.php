<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	/**
	 * Grava os dados na tabela.
	 * @param $dados. Array que contém os campos a serem inseridos
	 * @param Se for passado o $id via parâmetro, então atualizo o registro em vez de inseri-lo.
	 * @return boolean
	 */    

    public function login($username, $password){
        $this->db->where("username", $username);
        $this->db->where("password", md5($password));
        $usuario = $this->db->get("user")->row_array();
        return $usuario;
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_register extends CI_Model {

	/**
	 * Grava os dados na tabela.
	 * @param $dados. Array que contém os campos a serem inseridos
	 * @param Se for passado o $id via parâmetro, então atualizo o registro em vez de inseri-lo.
	 * @return boolean
	 */
	public function store($dados = null, $id = null) {
		if ($dados) {
			if ($id) {
				$this -> db -> where('id', $id);
				if ($this -> db -> update("user", $dados)) {
					return true;
				} else {
					return false;
				}
			} else {
				if ($this -> db -> insert("user", $dados)) {
					return true;
				} else {
					return false;
				}
			}
		}		
	}
}		

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	/**
	 * Método principal do gerenciador de tarefas
	 * @param nenhum
	 * @return view
	*/

	public function index()
	{
		$this -> lang -> load('en_admin', 'english');
		$this->load->view('login/register');
		// $this->load->view('teste2');

	}

	public function store(){
		// $this -> load -> model('m_register');
		$this -> load -> library('form_validation');
		$this -> lang -> load('en_admin');
		$this -> load -> model('m_register');
 		
 	// 	$this -> db -> select('username');
 	// 	$this -> db -> from('user');
		// $usersEmail = $this -> db -> get();

		$rules = array (
					array (
						'field'		=>	'usr_name',
						'label'		=>	'lang:register_name',
						'rules'		=>	'required',						
						),			

					array (
						'field'		=>	'usr_register',
						'label'		=>	'lang:register_number',
						'rules'		=>	'required|is_unique[user.register]',						
						),	

					array (
						'field'		=>	'usr_birth',
						'label'		=>	'lang:register_birth',
						'rules'		=>	'required',						
						),	

					array (
						'field'		=>	'usr_zip',
						'label'		=>	'lang:register_contact_zip',
						'rules'		=>	'required',						
						),

					array (
						'field'		=>	'usr_number',
						'label'		=>	'lang:register_contact_number',
						'rules'		=>	'required',						
						),	

					array (
						'field'		=>	'usr_cel',
						'label'		=>	'lang:register_contact_cel',
						'rules'		=>	'required',						
						),	

					array (
						'field'		=>	'usr_tel',
						'label'		=>	'lang:register_contact_tel',
						'rules'		=>	'required',						
						),	

					array (
						'field'		=>	'usr_cel',
						'label'		=>	'lang:register_contact_cel',
						'rules'		=>	'required',						
						),

					array (
						'field'		=>	'usr_username',
						'label'		=>	'lang:register_username',
						'rules'		=>	'required|is_unique[user.username]|min_length[4]|max_length[12]',						
						),

					array (
						'field'		=>	'usr_password',
						'label'		=>	'lang:register_password',
						'rules'		=>	'required|matches[usr_passwordConf]|min_length[6]|max_length[12]',						
						),

					array (
						'field'		=>	'usr_passwordConf',
						'label'		=>	'lang:register_password_confirmation',
						'rules'		=>	'required',						
						),

					array (
						'field'		=>	'usr_email',
						'label'		=>	'lang:register_contact_email',
						'rules'		=>	'required|valid_email|is_unique[user.email]',						
						),								
		);

		$this -> form_validation -> set_rules($rules);

		if($this -> form_validation -> run() == FALSE){
			$usr_name 		= $this -> input -> post('usr_name');
			$usr_register 	= $this -> input -> post('usr_register');
			$usr_birth		= $this -> input -> post('usr_birth');
			$usr_zip		= $this -> input -> post('usr_zip');
			$usr_number		= $this -> input -> post('usr_number');
			$usr_tel		= $this -> input -> post('usr_tel');
			$usr_cel		= $this -> input -> post('usr_cel');
			$usr_username	= $this -> input -> post('usr_username');
			$usr_email		= $this -> input -> post('usr_email');
			$this -> load -> view('login/register', $usr_name);
		} else{
			$dados = array (
					"name"			=> $this -> input -> post('usr_name'),
					"sex"			=> $this -> input -> post('usr_sex'),
					"nacionality"	=> $this -> input -> post('usr_nacionality'),
					"register" 		=> $this -> input -> post('usr_register'),
					"birth"			=> $this -> input -> post('usr_birth'),
					"zip"			=> $this -> input -> post('usr_zip'),
					"street"		=> $this -> input -> post('usr_street'),
					"number"		=> $this -> input -> post('usr_number'),
					"district"		=> $this -> input -> post('usr_district'),
					"city"			=> $this -> input -> post('usr_city'),
					"state"			=> $this -> input -> post('usr_state'),
					"tel"			=> $this -> input -> post('usr_tel'),
					"cel"			=> $this -> input -> post('usr_cel'),
					"username"		=> $this -> input -> post('usr_username'),
					"password"		=> md5($this -> input -> post('usr_password')),
					"email"			=> $this -> input -> post('usr_email'),
				);
		if ($this -> m_register -> store($dados)){
			$var['message'] = $this -> lang -> line('register_success');
			$this -> load -> view('templates/success', $var);
		} else {
			$var['message'] = $this -> lang -> line('register_error');
			$this -> load -> view('templates/error', $var);
		}
		}
	}

}
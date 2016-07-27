<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); // linha de proteção ao controller
 
class Login extends CI_Controller{ // criação da classe Login
 
    public function index()
	{
		if ($this -> session -> userdata("usuario_logado")){
			$this -> lang -> load('en_admin', 'english');
			$this->load->view('login/register');			
		} else{
			$this -> lang -> load('en_admin', 'english');
			// $this -> load -> view('templates/header');
			$this->load->view('login/login');			
		}

//}
    }

    public function logar(){
		$this -> lang -> load('en_admin');    	
    	$rules = array (
					array (
						'field'		=>	'usr_username',
						'label'		=>	'lang:register_username',
						'rules'		=>	'required',						
						),

					array (
						'field'		=>	'usr_password',
						'label'		=>	'lang:register_password',
						'rules'		=>	'required',						
						)
				);

		$this -> form_validation -> set_rules($rules);

		if($this -> form_validation -> run() == FALSE){
			$this -> lang -> load('en_admin', 'english');
			$usr_username	= $this -> input -> post('usr_username');			
			$this->load->view('login/login', $usr_username);
		} else {

	        $this->load->model('m_login');// chama o modelo usuarios_model
	        $username = $this->input->post("usr_username");// pega via post o email que venho do formulario
	        $password = $this->input->post("usr_password"); // pega via post a senha que venho do formulario
	       
	        $usuario = $this->m_login->login($username,$password); // acessa a função buscaPorEmailSenha do modelo
	 
	        if($usuario){
	            $this->session->set_userdata("usuario_logado", $usuario);
	            $dados = array("message" => "Logado com sucesso!");
	            // redirect('home', 'refresh');
	            $this->load->view("templates/success",$dados);

	            
	        }else{
	            //$dados = array("mensagem" => "Não foi possível fazer o Login!");
	            $dados = array("message" => "Usuário não cadastro, tente novamente");
	            $this->load->view("templates/error",$dados);
	        }

		}


 
        // $this->load->view("login/autenticar", $dados);
        // $this->load->view("templates/success",$dados);

    }
    public function logout(){
    	$this->session->sess_destroy();
    	$this -> lang -> load('en_admin', 'english');
 		redirect('welcome', 'refresh');
    }
}		
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller 
{

	public function __construct() 
	{
	    parent::__construct();
	}

	public function listarUsuarios()
	{
		$this->load->model('usuario_model');

        $data = $this->usuario_model->recuperaUsuarios();

       $this->output
        		->set_content_type('application/json', 'utf-8')
        		->set_output(json_encode($data, 
        		JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));

	}

	public function listarUsuario($id)
	{
		$this->load->model('usuario_model');

        $data = $this->usuario_model->recuperaUsuario($id);

       $this->output
        		->set_content_type('application/json', 'utf-8')
        		->set_output(json_encode($data, 
        		JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	}

	public function criarUsuario()
	{

		$data = [];
		$dados = json_decode(file_get_contents("php://input"), true);

		if(array_key_exists('nome', $dados) && is_string($dados['nome']))
		{
			$data['nome'] = $dados['nome'];

		}

		if(array_key_exists('data_nascimento', $dados) && date('Y-m-d',strtotime($dados['data_nascimento'])))
		{
			$data['data_nascimento'] = date('Y-m-d',strtotime($dados['data_nascimento']));

		}

		if(array_key_exists('email', $dados) && is_string($dados['email']))
		{
			$data['email'] = $dados['email'];

		}

		if(array_key_exists('telefone', $dados) && is_string($dados['telefone']))
		{
			$data['telefone'] = $dados['telefone'];

		}


		$this->load->model('usuario_model');

        $retorno = $this->usuario_model->incluiUsuario($data);

		$mensagem = 'Erro ao Incluir';
        if ($retorno) $mensagem = 'Incluido com Sucesso';
 
        $this->output
        		->set_content_type('application/json', 'utf-8')
        		->set_output(json_encode($mensagem , 
        		JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
 
	}

	public function editarUsuario($id)
	{
		$data = [];
		$dados = json_decode(file_get_contents("php://input"), true);
		
		if(array_key_exists('nome', $dados) && is_string($dados['nome']))
		{
			$data['nome'] = $dados['nome'];

		}

		if(array_key_exists('data_nascimento', $dados) && date('Y-m-d',strtotime($dados['data_nascimento'])))
		{
			$data['data_nascimento'] = date('Y-m-d',strtotime($dados['data_nascimento']));

		}

		if(array_key_exists('email', $dados) && is_string($dados['email']))
		{
			$data['email'] = $dados['email'];

		}

		if(array_key_exists('telefone', $dados) && is_string($dados['telefone']))
		{
			$data['telefone'] = $dados['telefone'];

		}

		$this->load->model('usuario_model');

        $retorno = $this->usuario_model->alterarUsuarios($id,$data);

         $this->output
        		->set_content_type('application/json', 'utf-8')
        		->set_output(json_encode($retorno , 
        		JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	}

	public function excluirUsuario($id)
	{
		$this->load->model('usuario_model');

        $retorno = $this->usuario_model->excluirUsuario($id);

        $this->output
        		->set_content_type('application/json', 'utf-8')
        		->set_output(json_encode($retorno , 
        		JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	}


}
<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'titulo' => 'Login',
        ];

        return view('Login/login', $data);
    }

    public function ajax_login() 
    {
        if (!$this->request->isAJAX()){return redirect()->back();}

		$retorno = [
		    'status' => 1,
            'error_list' => []
        ];

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if (empty($email)) {
			$retorno["status"] = 0;
			$retorno["error_list"]["#email"] = "E-mail não pode ser vazio!";
            return $this->response->setJSON($retorno);
        };    

        $autenticacao = service('autenticacao');

        if ($autenticacao->login($email,$password) === false){
            //Credenciais inválidas
            $retorno['status'] = 0;
            $retorno['error_list'] = ['#btn_login' => 'Credenciais inválidas!'];
    
            return $this->response->setJSON($retorno);
        };        

        if ($autenticacao->estaLogado() == false) {
            
            $retorno['status'] = 0;
            $retorno['error_list'] = ['#btn_login' => 'Usuário não adicionado à sessão!'];
    
            return $this->response->setJSON($retorno);
        }

        return $this->response->setJSON($retorno);
	}

    public function logoff()
    {
        $autenticacao = service('autenticacao');

        $usuarioLogado = $autenticacao->pegaUsuarioLogado();
        d($usuarioLogado);

        $autenticacao->logout();

        return redirect()->to(site_url());
    }
    
}

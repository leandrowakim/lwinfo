<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SiteModel;
use App\Entities\Site;

class Restrict extends BaseController
{
    private $usuarioModel;
    private $siteModel;
    private $equipeModel;

    public function __construct() {
        $this->usuarioModel = new \App\Models\UsuarioModel();
        $this->siteModel = new \App\Models\SiteModel();
        $this->equipeModel = new \App\Models\EquipeModel();
    }

    public function index()
    {
        $site = new Site();

        $data = [
            'titulo' => 'Área Restrita',
            'site' => $site,
            'member',
            'user'
        ];
        
        return view('Restrict/restrict', $data);
    }

	public function ajax_list_user() 
    {
        if (!$this->request->isAJAX()){return redirect()->back();}

        $atributos = [
            'id',
            'nome',
            'email',
        ];

        $usuarios = $this->usuarioModel->select($atributos)
                                       ->orderBy('id','DESC')
                                       ->findAll();

        $data = [];

		foreach ($usuarios as $usuario) 
        {
            $acoes = '<div style="display: inline-block;">
                        <button class="btn btn-primary btn-edit-user" 
                            id="'.$usuario->id.'">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button class="btn btn-danger btn-del-user" 
                            id="'.$usuario->id.'">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>';

			$data[] = [
                'id' => $usuario->id,
                'nome' => $usuario->nome,
                'email' => $usuario->email,
                'acoes' => $acoes,
            ];
		}

        $retorno = [
            'data' => $data,
        ];

        return $this->response->setJSON($retorno);
	}

	public function ajax_list_member() 
    {
        if (!$this->request->isAJAX()){return redirect()->back();}

        $atributos = [
            'id',
            'nome',
            'imagem',
            'descricao',
        ];

        $membros = $this->equipeModel->select($atributos)
                                     ->orderBy('id','DESC')
                                     ->findAll();

        $data = [];

		foreach ($membros as $membro) 
        {
            $acoes = '<div style="display: inline-block;">
                        <button class="btn btn-primary btn-edit-user" 
                            id="'.$membro->id.'">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button class="btn btn-danger btn-del-user" 
                            id="'.$membro->id.'">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>';

			$data[] = [
                'id' => $membro->id,
                'nome' => $membro->nome,
                'imagem' => $membro->imagem,
                'descricao' => $membro->descricao,
                'acoes' => $acoes,
            ];
		}

        $retorno = [
            'data' => $data,
        ];

        return $this->response->setJSON($retorno);
	}

	public function site_ajax_list() 
    {
        if (!$this->request->isAJAX()){return redirect()->back();}

        $atributos = [
            'id',
            'nome',
            'imagem',
            'url',
        ];

        $sites = $this->siteModel->select($atributos)
                                 ->orderBy('id','DESC')
                                 ->findAll();

        $data = [];

		foreach ($sites as $site) 
        {
            if ($site->imagem != Null)
            {    
                $imagem = [
                    'src' => site_url("sites/".$site->imagem),
                    'class' => 'round-circle img-fluid',
                    'alt' => esc($site->nome),
                    'width' => '50',
                ];
            } else 
            {
                $imagem = [
                    'src' => site_url("recursos/img/no_image.png"),
                    'class' => 'round-circle img-fluid',
                    'alt' => 'Site sem imagem',
                    'width' => '50',
                ];
            }

            $acoes = 
                '<div style="display: inline-block;">
                    <a class="btn btn-primary" href="restrict/site_edit/' . $site->id . '">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-danger" href="restrict/site_delete/' . $site->id . '">
                        <i class="fa fa-times"></i>
                    </a>
                </div>';

			$data[] = [
                'id' => $site->id,
                'nome' => $site->nome,
                'imagem' => $site->imagem = img($imagem),
                'url' => $site->url,
                'acoes' => $acoes,
            ];
		}

        $retorno = [
            'data' => $data,
        ];

        return $this->response->setJSON($retorno);  
	}

    public function site_ajax_upload()
    {
        if (!$this->request->isAJAX()){return redirect()->back();}

        //Recupero o post da requisição
        $post = $this->request->getPost();

        $site = $post;
        //Validamos a existência do usuário
        //$site = $this->buscaSite($post['id']);
        
        $retorno = [] ;

        $imagem = $this->request->getFile('imagem');

        list($largura, $altura) = getimagesize($imagem->getPathName());

        if ($largura < "300" || $altura < "300") 
        {
            $retorno['status'] = 0;
            $retorno['error'] = ['dimensao' => 'A imagem não pode ser menor do que 300 x 300 pixels'];
            return $this->response->setJSON($retorno);
        }

        $caminhoImagem = $imagem->store('sites');

        $caminhoImagem = WRITEPATH . "uploads/$caminhoImagem";

        $site['imagem'] = $imagem->getName();

        $retorno = [
            'status'   => 1,
            'img_path' => $imagem->getName(),
            'site'     => $site
        ];

        return $this->response->setJSON($retorno);
    }

    public function site_edit(int $id = null) 
    {
        $site = $this->siteModel->find($id);

        if (is_null($site)) {
            return redirect()->back()->with('mensagem', [
                'mensagem' => 'Erro - Site não Encontrado!',
                'tipo' => 'danger'
            ]);
        }

        echo view('form_site', [
            'site' => $site,
        ]);
    }

	public function site_save()
    {		
		$post = $this->request->getPost();

        $siteModel = new SiteModel();

        if ($siteModel->save($post)) {

        }
	}

}

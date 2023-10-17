<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SiteModel;
use App\Entities\Sites;

class Site extends BaseController
{
    private $siteModel;

    public function __construct() {
        $this->siteModel = new \App\Models\SiteModel();
    }

    public function index()
    {
        $sites = $this->siteModel->findAll();

        $retorno = [];
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
                    <a class="btn btn-primary" 
                        href="site/editar/' . $site->id . '">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-danger" 
                        href="site/deletar/' . $site->id . '">
                        <i class="fa fa-times"></i>
                    </a>
                </div>';

			$retorno[] = [
                'id' => $site->id,
                'nome' => $site->nome,
                'imagem' => $site->imagem = img($imagem),
                'url' => $site->url,
                'acoes' => $acoes,
            ];
		}

        $data = [
            'titulo' => 'Sites',
            'sites' => $retorno,
        ];
        
        return view('Sites/sites', $data);
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

    public function editar(int $id = null) 
    {
        $site = $this->siteModel->find($id);

        if (is_null($site)) {
            return redirect()->back()->with('mensagem', [
                'mensagem' => 'Erro - Site não Encontrado!',
                'tipo' => 'danger'
            ]);
        }

        echo view('Sites/editar', [
            'titulo' => 'Editar site',
            'site' => $site,
        ]);
    }

	public function salvar()
    {		
		$post = $this->request->getPost();

        $siteModel = new SiteModel();

        if ($siteModel->save($post)) {

        }
	}

}

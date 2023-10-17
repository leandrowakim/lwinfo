<?php

namespace App\Libraries;

class Autenticacao
{
   private $usuario;
   private $usuarioModel;

   public function __construct()
   {
      $this->usuarioModel = new \App\Models\UsuarioModel();
   }

   /**
    * Método que realiza o login na aplicação
    */
   public function login(string $email, string $password): bool
   {
      //Busca o usuário na base de dados por email
      $usuario = $this->usuarioModel->buscaUsuarioPorEmail($email);
      //Verifica se o usuário existe
      if ($usuario === null) {
         return false;
      }
      //Verifica se o password é igual ao cadastrado
      if ($usuario->verificaPassword($password) === false) {
         return false;
      }
      //Logamos o usuário na aplicação
      $this->logaUsuario($usuario);
      //Tudo certo, retornamos True. Login autorizado.
      return true;
   }

   /**
    * Método de logout
    *
    * @return void
    */
   public function logout():void
   {
      session()->destroy();
   }

   /**
    * Pega usuário logado na sessão
    *
    * @return void
    */
   public function pegaUsuarioLogado()
   {
      if ($this->usuario === null) {
         $this->usuario = $this->pegaUsuarioDaSessao();
      }
      return $this->usuario;
   }

   /**
    * Método que verifica se o usuário está logado
    *
    * @return boolean
    */
   public function estaLogado(): bool
   {
      return $this->pegaUsuarioLogado() !== null;
   }

   //----------------- Métodos privados

   /**
    * Método que insere na sessão o ID do usuário
    *
    * @param object $usuario
    * @return void
    */
   private function logaUsuario(object $usuario) : void
   {
      $session = session();
      //Antes de inserirmos o ID do usuário na sessão, geramos uma nova ID de sessão
      $session->regenerate();
      // UTILIZEM essa instrução que o efeito é o mesmo e funciona perfeitamente.
      //$_SESSION['__ci_last_regenerate'] = time();
      //Setamos o ID do usuário na sessão
      $session->set('usuario_id', $usuario->id);
   }

   private function pegaUsuarioDaSessao()
   {
      if (session()->has('usuario_id') == false) {
         return null;
      }

      $usuario = $this->usuarioModel->find(session()->get('usuario_id'));

      if ($usuario == null)
      {
         return null;
      }
 
      return $usuario;
   }

}

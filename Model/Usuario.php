<?php

class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $ativo;
 
    
    private $endereco;
     
    public function __construct($id=null,$nome=null,$senha=null,$email=null){
       $this->setId($id);
       $this->setNome($nome);
       $this->setSenha($senha);
       $this->setEmail($email);
    }
  

    public function __toString(){
        return $this->id.";".$this->nome.";".$this->email.";".$this->senha;
    }
  
  
  
  
    
    
    public function getNome()
    {
      return $this->nome;
    }
  
    
    public function setNome($nome)
    {
      $this->nome = $nome;
  
      return $this;
    }
  
    
    public function getEmail()
    {
      return $this->email;
    }
  
    
    public function setEmail($email)
    {
      $this->email = $email;
  
      return $this;
    }
  
    
    public function getSenha()
    {
      return $this->senha;
    }
  
   
    public function setSenha($senha)
    {
      $this->senha = $senha;
  
      return $this;
    }
  
  
  public function criptografar(){
       $chave = "www.cotiinformatica.com.brprofedsonbelem@gmail.com1=123456789;";
             $chave = md5($this->getSenha().$chave);
         $this->setSenha($chave);
    }
     


 
    public function getId()
    {
        return $this->id;
    }

    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

   
    public function getEndereco()
    {
        return $this->endereco;
    }

    
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }
 
    public function getAtivo()
    {
        return $this->ativo;
    }

  
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }
}




?>
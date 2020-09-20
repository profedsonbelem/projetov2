<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors',1);


class Endereco{
    private $idEndereco;
    private $logradouro;
    private $bairro;
    private $cidade;
    private $estado;
    private $cep;
    private $lat;
    private $lng;
    private $status; 
 /**
  * One To One
  */
    
    private $usuario;
     
    public function __construct($idEndereco=null,$logadouro=null,$bairro=null,$cidade=null,
    $estado=null,$cep=null){
       $this->setIdEndereco($idEndereco);
       $this->setLogradouro($logradouro);
       $this->setBairro($bairro);
       $this->setCidade($cidade);
       $this->setEstado($estado);
       $this->setCep($cep);
       
    }
  

    public function __toString(){
        return $this->idEndereco.";".$this->logradouro.";".$this->cidade.";".$this->bairro.','.
        $this->estado.';'.$this->cep;

    }

    public function getIdEndereco()
    {
        return $this->idEndereco;
    }

 
    public function setIdEndereco($idEndereco)
    {
        $this->idEndereco = $idEndereco;

        return $this;
    }

   
    public function getLogradouro()
    {
        return $this->logradouro;
    }
 
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;

        return $this;
    }

 
    public function getBairro()
    {
        return $this->bairro;
    }

   
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

 
    public function getCidade()
    {
        return $this->cidade;
    }

   
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

 
    public function getCep()
    {
        return $this->cep;
    }

 
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    
    public function getLat()
    {
        return $this->lat;
    }

  
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

  
    public function getLng()
    {
        return $this->long;
    }

  

    public function setLng($lng)
    {
        $this->lng = $lng;

        return $this;
    }

   
    public function getStatus()
    {
        return $this->status;
    }

  
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

  
    public function getEstado()
    {
        return $this->estado;
    }

  
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;

    }
    
    public function getUsuario()
    {
        return $this->usuario;
    }

 
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }
    }
 
  
  
  



?>






?>
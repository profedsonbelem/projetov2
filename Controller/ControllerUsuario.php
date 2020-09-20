<?php

//versionamento ... (versiona ...)
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors',1);

session_start();
include_once "../Model/Usuario.php";
include_once "../Persistence/UsuarioPDO.php";

class ControllerUsuario{



   public function resgateInclusao(){
       if (isset($_POST["nome"]) && (isset($_POST["email"])) && (isset($_POST["senha"]))) {
       
            $nome = $_POST["nome"];
            $email = $_POST["email"];
             $senha = $_POST["senha"];
        $usuario= new Usuario;
            $usuario->setId(0);
            $usuario->setNome($nome)->
                   setEmail($email)->
                            setSenha($senha);
          return $usuario;
   }else{
         return null;
   }
 }


  
   public function validacaoResgateInclusao($user){
        $email = $user->getEmail();
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          return true;     
      }else{
         return false;
      }
   }
 
 
   public function   requestValidacaoInclusaoValidacao(){
        $user =  $this->resgateInclusao();
       if ($user){
               $resposta =  $this->validacaoResgateInclusao($user);
          if ($resposta==true){
            return   $user;
              }else{
            return null;
        }  
       }else{
       return null;
      }
  }

  

   public function actionGravar($user){
          if (isset($user)){
             try{
              $pdo = new UsuarioPDO;
              $pdo->createLast($user);
              $_SESSION["msg"]= "Dados Gravados do Usuario";
              header('Location:../usuario.php');
            }catch(Exception $ex){
               $_SESSION["msg"]= "Error:".$ex->getMessage();
               header('Location:../usuario.php');
         }
        }else{
              $_SESSION["msg"]= "Dados Nao Validos para gravacao";
              header('Location:../usuario.php');
      }
   }
 
 //---------------------------------

  

   public function resgateLogin(){
      if ( (isset($_POST["email"])) && (isset($_POST["senha"]))) {
      
           $email = $_POST["email"];
            $senha = $_POST["senha"];
       $usuario= new Usuario;
           $usuario->      
                     setEmail($email)->
                           setSenha($senha);
         return $usuario;
  }else{
        return null;
  }
}


 
  public function validacaoResgateLogin($user){
       $email = $user->getEmail();
       $email = filter_var($email, FILTER_SANITIZE_EMAIL);
     if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
         return true;     
     }else{
        return false;
     }
  }


  public function   requestValidacaoLoginValidacao(){
       $user =  $this->resgateLogin();
      if ($user){
              $resposta =  $this->validacaoResgateLogin($user);
         if ($resposta==true){
           return   $user;
             }else{
           return null;
       }  
      }else{
      return null;
     }
 }

 

  public function actionLogin($user){
         if (isset($user)){
            try{
             $pdo = new UsuarioPDO;
             $logado =  $pdo->loginLast($user);
     
            if (isset($logado)){
             $_SESSION["msg"]= "Usuario Logado Com Sucesso";
             $_SESSION["usuario"]= $logado;
             header('Location:../View/USU/logado.php');
              }else{
                  throw new Exception('Nao Logado');
              }
           }catch(Exception $ex){
              $_SESSION["msg"]= "Error:".$ex->getMessage();
              header('Location:../usuario.php');
        }
       }else{
             $_SESSION["msg"]= "Dados Nao Validos para Login";
             header('Location:../usuario.php');
     }
  }


}


$controller = new ControllerUsuario();

$cmd = $_GET["cmd"];

if ($cmd=="gravar"){

   $user = $controller-> requestValidacaoInclusaoValidacao();
   $controller->actionGravar($user);
}else if ($cmd=="logar"){
  $user = $controller-> requestValidacaoLoginValidacao();
   $controller->actionLogin($user);
}

?>
















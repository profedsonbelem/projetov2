<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors',1);

include_once('../Model/Usuario.php');
include_once('Database.php');


class UsuarioPDO extends Database{

  public  $table;



   public function createLast($user){
    $nome = $user->getNome();
    $email = $user->getEmail();
    $user->criptografar();
    $senha = $user->getSenha();
  
    $sql= "insert into user values (null,:nome,:senha,:email, 1)";
     $stmt = Database::open()->prepare($sql);
     $stmt->bindValue(':nome', $nome , PDO::PARAM_STR);
     $stmt->bindValue(':senha', $senha, PDO::PARAM_STR);
     $stmt->bindValue(':email', $email, PDO::PARAM_STR);

     $result = $stmt->execute();

       if (!$result){
           var_dump($stmt->errorInfo);
           exit;
       }else{
         $codigo = Database::open()->lastInsertId();
         $user->setId($codigo);  
       return  $user->getId();
       }
}
  


      public function loginLast($user){
           $email = $user->getEmail();
           $user->criptografar();
           $senha = $user->getSenha();
   
         $sql= "select * from user where  senha=:senha  and  email=:email and ativo=1  ";
          $stmt = Database::open()->prepare($sql);
          $stmt->bindValue(':senha', $senha , PDO::PARAM_STR);
          $stmt->bindValue(':email',$email , PDO::PARAM_STR);
  
          $stmt->execute();
           return $stmt->fetch();

  }




   public function find($id)
   {
       $sql  = "SELECT * FROM usuario  WHERE id = :id";
       $stmt = Database::getInstance()->prepare($sql);
       $stmt->bindValue(':id', $id, PDO::PARAM_INT);
       $stmt->execute();
       return $stmt->fetch();
   }

   public function findByNome($nome){
       $sql = "SELECT * FROM user WHERE nome = :nome";
       $stmt = Database::getInstance()->prepare($sql);
       $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
       $stmt->execute();
       return $stmt->fetch();
   }

   public function findByEmail($login){
       $sql = "SELECT * FROM user WHERE email = :email";
       $stmt = Database::getInstance()->prepare($sql);
       $stmt->bindValue(':login', $login, PDO::PARAM_STR);
       $stmt->execute();
       return $stmt->fetch();
   }

   public function findAll()
   {
       $sql  = "SELECT * FROM usuario";
       $stmt = Database::getInstance()->prepare($sql);
       $stmt->execute();
       return $stmt->fetchAll();
   }


   public function delete($id)
   {
       $sql  = "DELETE FROM usuario WHERE id = :id";
       $stmt = Database::getInstance()->prepare($sql);
       $stmt->bindValue(':id', $id, PDO::PARAM_INT);
       return $stmt->execute();
   }

   public function update($usuario){
       try {
           $id = $usuario->getId();
           $nome = $usuario->getNome();
           $senha = $usuario->getSenha();
           $login = $usuario->getLogin();
           
           $stmt =  Database::getInstance()->
prepare('UPDATE usuario SET nome=:nome,senha=:senha, 
  login=:login WHERE id = :id');
           $stmt->execute(array(
             ':id'   => $id,
             ':nome' => $nome,
             ':senha' => $senha,
             ':login'=> $login
           ));
              
           echo $stmt->rowCount(); 
         } catch(PDOException $e) {
           echo 'Error: ' . $e->getMessage();
         }
   }

 }



//  try{
//   $pdo  = new UsuarioPDO();

//  $user = new Usuario(0,'edson','123','edson@gmail.com');


// $linha = $pdo->loginLast($user);

//  if ($linha){
//      echo " Logado ...".$linha->nome;
//  }else{
//       echo " Nao Logado ";
//  }


//  }catch(Exception $ex){
//      echo $ex->getMessage();
//  }


 ?>

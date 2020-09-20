#Instalacação 










//Versionamento Materia Nova (GitHUB) 







===========

/////e10adc3949ba59abbe56e057f20f883e
        //123456www.cotiinformatica.com.brprofedsonbelem@gmail.com1=123456789;
//     
//  //.$chave
model na área da Usuário vira objeto ...
# senha com a chave

$obj = new Usuario(10,"junior","jr@gmail.com","123456");
$obj->criptografar();

# md5 ('123456' + 'chave monstruosa' )
# salt (despista )...
# 32 bits de senha, vai para 31, salt ...
# md5 jogar em uma sequencia alfanumerica ...
# senha + chave (combincao de volta) ...




//$usuario = new Usuario(10,"leopoldo","123456","leopoldo@gmail.com");
//echo $usuario;

<?php

error_reporting(E_ALL);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors',1);

include_once('../Model/Usuario.php');
include_once('../Persistence/PDO.php');
include_once('../Persistence/UsuarioDao.php');
include_once('../IO/ArquivoGravar.php');

 if ($_SERVER["REQUEST_METHOD"]=='POST'){

    if ($_REQUEST["acao"]=="registrar"){
 
try {
    $lo= new Usuario();
    $lo->setNome($_POST["nome"]);
    $lo->setLogin($_POST["login"]);
    $lo->setSenha($_POST["senha"]);

         
    $obj = new LoginDao();
    $obj->create($lo);

    $login= $lo->getLogin();
    $save = new ArquivoGravar();

    $linha= "[{status:aberto,data:".date('d/m/y H:i:s').','."{usuario:".$lo."}]";
    $save->gravarTXT($linha);

    echo "<br/>Dados resgatados e gravado :".$lo->getLogin();


}catch(Exception $ex){
  echo $ex->getMessage();
}



 }
   }
 
 


|#

<?php
error_reporting(E_ALL);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', 1);


include_once  'Database.php';
include_once  '../Model/User.php';

class UserPDO extends Database{

   protected $table;
 
   
     

           
    
}

//OO Na Patica... pecas de encaixe...
//Bcrypt
//Captcha
//Session
//Storage
//Filter Sanitizer Vd em JS
//Serializable
//email e sms
//manytoOne
//Compra (... projeto ...)

  try{
   $pdo  = new UserPDO;

  $user = new User(0,'ewerton','ewerton oliveira','ewerton@gmail.com',0,'123456');


 $linha = $pdo->login($user);

  if ($linha){
      echo " Logado ...".$linha->nome;
  }else{
       echo " Nao Logado ";
  }


  }catch(Exception $ex){
      echo $ex->getMessage();
  }



daTabase

try{

$bd = new Database;
$bd->open();
var_dump(Database::$conn);
}catch(Exception $ex){
    vardump ( $ex->getMessage() );
}

----------------

//var_dump(self::$conn); 



====================



 //$usu = new Usuario(null,"lu9","123456","lu9@gmail.com");
 // $pdo =new UsuarioPDO;
 //$dado =  ($pdo->loginLast($usu));
 //$pdo->loginLast($usu)


//if($dado){
 //  echo $dado->nome."<br/>";
//   echo $dado->email."<br/>";
// }
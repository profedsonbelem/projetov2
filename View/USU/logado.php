<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors',1);

include_once "../../Model/Usuario.php";
echo "estou aqui 1";
  session_start();
 try{
     //caminho de volta 
     echo "estou aqui 2";
  if (!empty($_SESSION["msg"])){
    

          $msg =  $_SESSION["msg"];
         $logado = $_SESSION["usuario"];
          echo "<br/><b>".$msg.' , '.$logado->nome."</b>";
         echo "<br/>estou aqui 2.5";
     unset($_SESSION["msg"]);
  }else{
    echo "estou aqui 3";
  }
 }catch(Exception $ex){
     echo $ex->getMessage();
 }

?>





<?php 
  session_start();
 try{
     //caminho de volta 
  if (!empty($_SESSION["msg"])){
      //a variavel resgata a sessao  mensagem (msg)
     $msg = $_SESSION["msg"];
     echo "<br/><b>".$msg."</b>";
     //apago ..
     unset($_SESSION["msg"]);
  }
 }catch(Exception $ex){
 }
?>





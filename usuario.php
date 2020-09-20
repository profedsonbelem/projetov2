<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
<src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></>
<src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></>
</head>

</head>
<body>
<div class="container">
 <h2>Formulario do Cadastro do Usuario</h2>
 <p/>

<form method="post"  action="Controller/ControllerUsuario.php?cmd=gravar">
<div class="form-group">
<label   for="nome">Nome</label>
<input  type="text"   name="nome" id="nome"   pattern="[a-z A-Z]{2,50}" 
   title="entre com o nome"
   required />
</div>
<div class="form-group">
<label for="nome">Email</label>
<input type="email" name="email" id="email"      title="entre com o email" />
</div>
<div class="form-group">
<label for="nome">Senha</label>
<input type="password" name="senha" id="senha" 
        title="entre com o Senha" required />
</div>
<br/>
<button  type="submit" class="btn btn-primary">Enviar os Dados</button>
</div>
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
<br/><br/>
<a href="logar.php">Logar</a>
</body>
</html>






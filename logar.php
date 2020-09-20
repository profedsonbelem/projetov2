<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
</head>

</head>
<body>
<div class="container">
 <h2>Logar Usuario</h2>
 <p/>
<form method="post"  action="Controller/ControllerUsuario.php?cmd=logar">
 
 <img src="captcha/captcha.php" alt="Codigo para Acesso"/>
 <div class="form-group">
<label for="captcha">Digite o Codigo</label>
<input type="text" name="captcha" id="captcha" 
   required />
</div>

<div class="form-group">
<label for="nome">Email</label>
<input type="email" name="email" id="email" 
        title="entre com o nome"
 required />
</div>
<div class="form-group">
<label for="nome">Senha</label>
<input type="password" name="senha" id="senha" 
        title="entre com o Senha" required />
</div>
<br/>
<button  type="submit" class="btn btn-primary">Logar</button>
</div>
<?php 
  session_start();
 try{
  if (!empty($_SESSION["msg"])){
     $msg = $_SESSION["msg"];
     echo "<br/><b>".$msg."</b>";
     unset($_SESSION["msg"]);
  }
 }catch(Exception $ex){
 }
?>
<br/><br/>
<a href="usuario.php">Voltar</a>
</body>
</html>





 
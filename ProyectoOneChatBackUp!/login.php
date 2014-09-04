<?php 
session_start();
if(isset($SESSION)){
header("Location:usuarios.php");
} else {
?>
<body background="UAN.png">
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div align='center'><h1> Si ya tienes cuenta en </h1></div>
<?php 
print "<center><img src=\"logo.png\">" 
?>
<div align='center'><h1> Identificate! </h1></div>

<form action="inicio_sesion.php" method="post">
NickName
<br>
<input type="text" name="login">
<br>
Password:
<br>
<input type="password" name="pass">
<br>
<input type="submit" value="Ingresar">
</form>
<label><a href="index.php">No estas registrado aun? Registrate!</a></label>
<?php
}
?>
<?php
session_start();
include("config.php");
$login = htmlspecialchars(trim($_POST['login']));
$pass = sha1(md5(trim($_POST['pass']))); //encriptar password
$link = mysql_connect($datos[0],$datos[1],$datos[2]);
$query = sprintf("SELECT nombre,apellidos,login,password,email FROM usuarios WHERE login='%s'and password='%s'",
mysql_real_escape_string($login), mysql_real_escape_string($pass));
$result = mysql_db_query($datos[3],$query,$link);
if(mysql_num_rows($result)){
$array = mysql_fetch_array($result);
$_SESSION["login"] = $array["login"];
$_SESSION["nombre"] = $array["nombre"];
$_SESSION["apellidos"] = $array["apellidos"];
$_SESSION["email"] = $array["email"];
header("Location:user.php");
} else {
echo "<center>Wow! Tu NickName o tu Password son incorrectos. Digitalos de nuevo.";
echo "<center><a href='login.php'>Volver a Ingresar</a>";
}

?>
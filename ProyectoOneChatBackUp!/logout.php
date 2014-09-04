<?php
session_start();
if(!isset($_SESSION)){ //vacio
header("Location:login.php");
} else {
include("config.php");
mysql_connect($datos[0],$datos[1],$datos[2]);
$db = mysql_select_db($datos[3]);
$sql = "UPDATE usuarios SET estado=0 WHERE login='".$_SESSION['login']."'";
mysql_query($sql);
session_unset(); //desloguear
session_destroy(); //sale


echo "<center>Cerraste tu sesion. Para volver a ingresar entra a: <a href='login.php'>OneChat</a>";
echo "</center>";
}
?>
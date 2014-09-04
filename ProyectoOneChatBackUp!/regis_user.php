<?php
include("config.php");
$nombre = htmlspecialchars(trim($_POST['nombre'])); //buscar trim. Recoja variables enviadas desde otro formulario=POST.
$apell = htmlspecialchars(trim($_POST['apellidos']));
$login = htmlspecialchars(trim($_POST['login']));
$pass1 = trim($_POST['pass1']);
$pass2 = trim($_POST['pass2']);
$email = htmlspecialchars(trim($_POST['email']));
$link = mysql_connect($datos[0],$datos[1],$datos[2]);

$query = sprintf("SELECT login FROM usuarios WHERE usuarios.login='%s'",
mysql_real_escape_string($login));
$result = mysql_db_query($datos[3],$query,$link);
if(mysql_num_rows($result)){
    echo "Ups! Ya hay alguien registrado con este usuario. Intenta de nuevo con otro: <a href='index.php'>Volver a Intentar</a>";
} else {
mysql_free_result($result);
if($pass1 != $pass2){
echo "Tus passwords no coinciden!! Intenta de nuevo: <a href='index.php'>Volver a Intentar</a>";
} else {
$pass1 = sha1(md5($pass1));
$query = sprintf("INSERT INTO usuarios (nombre, apellidos, login, password, email) VALUES ('%s','%s','%s','%s','%s')",
mysql_real_escape_string($nombre) , mysql_real_escape_string($apell),
mysql_real_escape_string($login) , mysql_real_escape_string($pass1),
mysql_real_escape_string($email));
$result = mysql_db_query($datos[3],$query,$link);
if(mysql_affected_rows()){
echo "Perfecto.Tu registro fue exitoso!<br>";
echo "<a href='login.php'>Iniciar Sesi&oacute;n</a>";
} else {
echo "ErrorErrorError!! Introduce de nuevo el usuario.";
}
}
}
?>

<?php
session_start();
include("config.php");
mysql_connect($datos[0],$datos[1],$datos[2]);
mysql_select_db($datos[3]);
$bd = "SELECT banned FROM usuarios WHERE login='".$_SESSION['login']."'";
$rank = "SELECT rango FROM usuarios WHERE login='".$_SESSION['login']."'";
$res = mysql_query($rank);
$rango = mysql_fetch_array($res);
$result = mysql_query($bd);
$ban = mysql_fetch_array($result);

if($ban["banned"] == 0){
if(!isset($_SESSION)){
header("Location:login.php");
} else {
echo "";
echo "<center><h1>Bienvenido a la sala principal de OneChat!</h1></center>";
echo $_SESSION["nombre"]." ".$_SESSION["apellidos"]."<br>";
echo "<strong> Estas en la zona de usuarios <br>";
echo "</strong> Ingresaste con el Nickname: <strong> ";
echo $_SESSION["login"];
echo "</strong><br>";
echo "Deseas Salir?   <a href='logout.php'>Cerrar mi sesion</a>";
echo "";
}
$sql = "UPDATE usuarios SET estado=1 WHERE login='".$_SESSION['login']."'";
mysql_query($sql);
?>
<title>Bienvenido</title>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="400"><iframe src="mensajes.php" width="700" height="300" scrolling="no"></iframe></td>
</tr>
<tr>
<td align="center"><form id="form1" name="form1" method="post" action="ejecutar.php">
<label></label>
<label></label>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
<label>
<?php $alias = $_SESSION['login']; echo $alias." dice :"; ?>
</label></td>
<br>
<td bgcolor="#FFFFFF">Escribe tu mensaje aqui! <br>
Ten en cuenta que solo puedes escribir 100 caracteres por mensaje!
    <script>
    contenido_textarea = ""
    num_caracteres_permitidos = 100
    
    function valida_longitud(){
        num_caracteres = document.forms[0].mensaje.value.length 

   if (num_caracteres > num_caracteres_permitidos){ 
      document.forms[0].mensaje.value = contenido_textarea 
   }else{ 
      contenido_textarea = document.forms[0].mensaje.value    
   } 

   if (num_caracteres >= num_caracteres_permitidos){ 
      document.forms[0].caracteres.style.color="#ff0000"; 
   }else{ 
      document.forms[0].caracteres.style.color="#000000"; 
   } 

   cuenta() 
} 
function cuenta(){ 
   document.forms[0].caracteres.value=document.forms[0].mensaje.value.length 
} 
    
    </script>
<textarea name="mensaje" cols="40" rows="5" onKeyDown="valida_longitud()" onKeyUp="valida_longitud()"></textarea>
<br> <input type="text" name=caracteres size=4><br>
<input type="submit" name="submit" value="Enviar">
</td>
</tr>
</table>
</form></td>
</tr>
</table>
<?php
if($rango['rango'] >= 5){
echo "Panel Administrativo.<br>";
echo "Que deseas realizar?<br>";
?>
<i>Recuerda escribir todo con exactitud.<br></i>
<form method="post">
<select name="sel">
<option selected>Elegir</option>
<option>Banear una cuenta</option>
<option>Dar rango</option>
<option>Cambiar mensaje de bienvenida</option>
</select><br>
Nick :<input type="text" name="nick" size="10"><br>
Valor :<input type="text" name="valor" size="10"><br>
<input type="submit" value="Realizar"><br>
<?php
$nick = $_POST['nick'];
$valor = $_POST['valor'];
$sel = $_POST['sel'];
switch($sel){
case("Cancelar una cuenta"):
$sql = "UPDATE usuarios SET banned='".$valor."' WHERE login='".$nick."'";
mysql_query($sql);
echo "La cuenta del usuario ".$nick." ha sido cancelada con exito.";
break;
case("Dar rango"):
$sql = "UPDATE usuarios SET rango='".$valor."' WHERE login='".$nick."'";
mysql_query($sql);
echo "El usuario ".$nick." se le ha asignado nivel ".$valor;
break;
case("Cambiar mensaje de bienvenida"):
$sql = "UPDATE bienvenida SET mensaje='".$valor."'"; 
mysql_query($sql);
echo "Mensaje de bienvenida cambiado a <font color='green'>".$valor."</font>.";
break;
default:
echo "Selecciona por favor";
}
echo "</form>";
}
?>
<?php
}else{
    echo "La cuenta ha sido cancelada por motivos de seguridad.<a href='index.php'>Regresar</a>";
}
?>
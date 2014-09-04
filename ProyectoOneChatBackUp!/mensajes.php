<?php
session_start();
include("config.php");
mysql_connect($datos[0],$datos[1],$datos[2]);
mysql_select_db($datos[3]);
header('refresh:2; url=mensajes.php');
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
    background-color: #CDC1C5;
}
-->
</style><table width="202" border="0" cellspacing="0" cellpadding="0">
Sala principal
<?php
$sql = "SELECT * FROM bienvenida";
$query = mysql_query($sql);
$bnv = mysql_fetch_array($query);
echo "<font color='red'>".$bnv[0]." </FONT>--<font color='green'> ".$_SESSION['login']."</font>";
?>
<hr>
  <tr>
    <td width="202">
   <?php
                $rank = "SELECT rango FROM usuarios WHERE login='".$_SESSION['login']."'";
                $res = mysql_query($rank);
                $rango = mysql_fetch_array($res);
        $re=mysql_query("select * from mensajes order by id asc"); // "select * from mensajes where id-sala=1 order by id asc"
                
        while($f=mysql_fetch_array($re)){
                
        echo "<scpan class='fecha'></span>".$f['fecha']."&nbsp;&nbsp;<span class='usuario'>".$f['alias']."</span>:&nbsp;&nbsp;&nbsp;<span class='mensaje'>".htmlentities($f['mensaje'])."</span><br>";
        
                }
                
        ?></td>
  </tr>
</table>
<html>
<head>
<title>Registro</title>
</head>
<body>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<body background="UAN.png">
<div align='center'><h1>BIENVENIDO A</h1></div>
<?php 
print "<center><img src=\"logo.png\">" 
?>

<div align='center'><h1>Rellena los campos para registrarte e ingresar:</h1></div><br>
<form method="POST" action="regis_user.php">
<br>
<div align='center'>Nombre:
<input type="text" name="nombre" size=20>
</div>
<br>
<div align='center'>Apellidos:
<input type="text" name="apellidos" size=20>
</div>
<br>
<div align='center'>NickName:
<input type="text" name="login" size=20>
</div>
<br>
<div align='center'>Password:
<input type="password" name="pass1" size=20>
</div>
<br>
<div align='center'>Digita de nuevo tu password:
<input type="password" name="pass2" size=20>
</div>
<br>
<div align='center'>Email:
<input type="text" name="email" size=20>
</div>
<br>
<div align='center'><input type="submit" value="Pulsa para registrarte"></div>
<br>
</form>
<label><a href="login.php">Ya tienes cuenta en OneChat?? Ingresa!</a></label>
<br>
<br>
<br>
<br>
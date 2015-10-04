<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<title>Instalador de Aramateix.es</title>
<style>
body{background:#464646;font-family:Arial, Helvetica, sans-serif;font-size:12px;margin: 0}
#envoltura{position:absolute;left:50%;top:50%;margin-left:-165px;margin-top:-150px;width:330px}
#mensaje{background: #ececec;border: 1px solid #000;border-radius:2px;box-shadow: 0 0 0 2px rgba(255,255,255,.1);display: none;font-weight: bold;height: 20px;line-height: 20px;left: 30px;position: absolute;right: 30px;text-align: center;top: -50px}
#mensaje.mensaje-rojo{border-color: #e9322d;color: #e9322d;}
#mensaje.mensaje-verde{border-color: #46a546;color: #46a546;}
#contenedor{background-color:#356AA0;box-shadow: 0 0 0 5px rgba(255,255,255,.3);-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;}
#cabecera{border-bottom: 1px solid #666;color:#FFF;font-family:'Trebuchet MS', Helvetica, sans-serif;font-size:28px;height:50px;line-height:50px;text-shadow: 1px 1px 2px #000000;text-align:center}
#cabecera h1{color:#FFF;font-family:'Trebuchet MS', Helvetica, sans-serif;font-size:18px;}
#cuerpo{background:#ececec;border:solid #ccc;border-width: 1px 0;padding:10px 30px;}
.mensaje { text-align:center; color:red; font-weight:bold; padding:4px; }
form,p{margin:0}
p{padding-bottom: 5px}
.mb10{margin-bottom: 10px}
label{color: #666;font-weight: bold}
input{border: 1px solid #999;border-radius:2px;box-shadow: 0 0 0 2px rgba(0,0,0,.1);font:bold 12px Arial, Helvetica, sans-serif;height: 24px;line-height: 24px;padding:0 2px; width:100%;}
/*input#usuario{background:#fff url(../img/login-sprite.png) no-repeat 0 -23px;padding-left: 20px;width: 244px}
input#contrasenia{background:#fff url(../img/login-sprite.png) no-repeat 0 -53px;padding-left: 20px;width: 244px}*/
.oculto{display: none}
.captcha img{border:1px solid #999;float: left;margin-right: 10px}
.captcha input{width: 60px;text-transform: uppercase}
.boton{ width:auto; background: #ccc;color: #666;background: -moz-linear-gradient(top,#eee,#ccc);background: -webkit-linear-gradient(top,#eee,#ccc);background: linear-gradient(top,#eee,#ccc);padding:0 10px;}
.boton:active{position: relative;top: 1px}
#pie{border-top: 1px solid #666;color: #fff;font-size: 11px;height: 24px;line-height: 24px;text-align: center}
#pie a{color: #fff;font-size: 11px;}
#nota{padding-top: 20px;}
#nota a{display: block;height: 18px;margin: 0 auto;opacity:.28;overflow: hidden;text-indent: 100%;-webkit-transition:opacity .3s linear;-moz-transition:opacity .3s linear;transition:opacity .3s linear;width: 125px}
#nota a:hover{opacity:.5}
</style>
</head>
<body>
<?php 
if( ( isset($_POST['base_datos']) ) and ( isset($_POST['usuario']) ) and ( isset($_POST['contrasenia']) ) ){
	$dbhost='localhost'; 
	$dbusername=$_POST['usuario']; 
	$dbuserpass=$_POST['contrasenia'];
	$dbname=$_POST['base_datos'];

$total = 0;
	
$conecta = mysql_connect($dbhost, $dbusername, $dbuserpass); 
if (!$conecta) { 
die('No conectat : ' . mysql_error()); 
} 
$db_selected = mysql_select_db($dbname, $conecta); 
if (!$db_selected) { 
echo 'No es troba la base de dades',$db_selected,'<br/>'; 
die (mysql_error()); 
} 
else { 
$texto = file_get_contents("data.sql");
$sql = explode(";", $texto);


foreach($sql as $command){
        if(trim($command)){
            $success += (@mysql_query($command)==false ? 0 : 1);
            $total += 1;
        }
}

//for($i = 0; $i < (count($sentencia)-1); $i++){
//$db_selected = mysql_query ("$sentencia[$i];") or die(mysql_error()); 
//}
}

	
/*$conecta = mysql_connect($dbhost, $dbusername, $dbuserpass); 
if (!$conecta) { 
die('No conectat : ' . mysql_error()); 
} 
$db_selected = mysql_select_db($dbname, $conecta); 
if (!$db_selected) { 
echo 'No es troba la base de dades',$db_selected,'<br/>'; 
die (mysql_error()); 
} 
else { 
$texto = file_get_contents("data.sql");
$sentencia = explode(";", $texto);
for($i = 0; $i < (count($sentencia)-1); $i++){
$db_selected = mysql_query ("$sentencia[$i];") or die(mysql_error()); 
}
} 
*/	
/*
	mysql_connect ($dbhost, $dbusername, $dbuserpass); 
	mysql_select_db($dbname) or die('Cannot select database');
$file_content = file('data.sql');
$query = "";
foreach($file_content as $sql_line){
if(trim($sql_line) != "" && strpos($sql_line, "--") === false){
 $query .= $sql_line;
 if (substr(rtrim($query), -1) == ';'){
   //echo $query;
   $result = mysql_query($query)or die(mysql_error());
   $query = "";
  }
 }
}*/	
	
/*	
	$sql = file_get_contents(dirname(__FILE__).'data.sql');
	
	
	$tokens = preg_split("/(--.*\s+|\s+|\/\*.*\*\/)/", $sql, null, PREG_SPLIT_NO_EMPTY);
    $query = count($tokens);
//	$result = mysql_query($query);

    $length = count($tokens);
    
    $query = '';
    $inSentence = false;
    $curDelimiter = ";";
    // Comienzo a recorrer el string
    for($i = 0; $i < $length; $i++) {
 $lower = strtolower($tokens[$i]);
 $isStarter = in_array($lower, array( // Chequeo si el token actual es el comienzo de una consulta
     'select', 'update', 'delete', 'insert',
     'delimiter', 'create', 'alter', 'drop', 
     'call', 'set', 'use'
 ));

 if($inSentence) { // Si estoy parseando una sentencia me fijo si lo que viene es un delimitador para terminar la consulta
     if($tokens[$i] == $curDelimiter || substr(trim($tokens[$i]), -1*(strlen($curDelimiter))) == $curDelimiter) { 
  // Si terminamos el parseo ejecuto la consulta
  $query .= str_replace($curDelimiter, '', $tokens[$i]); // Elimino el delimitador
  $result = mysql_query($query);//$_db->query($query);
  $query = ""; // Preparo la consulta para continuar con la siguiente sentencia
  $tokens[$i] = '';
  $inSentence = false;
     }
 }
 else if($isStarter) { // Si hay que comenzar una consulta, verifico qué tipo de consulta es
     // Si es delimitador, cambio el delimitador usado. No marco comienzo de secuencia porque el delimitador se encarga de eso en la próxima iteración
     if($lower == 'delimiter' && isset($tokens[$i+1]))  
  $curDelimiter = $tokens[$i+1]; 
     else
  $inSentence = true; // Si no, comienzo una consulta 
     $query = "";
 }
 $query .= "{$tokens[$i]} "; // Voy acumulando los tokens en el string que contiene la consulta
    }

*/	
?>
<div id="envoltura">
<div id="contenedor" class="curva">
	<div id="cabecera" class="tac">
		<h1>Installador de Aramateix.es</h1>
	</div>
	<div id="cuerpo">
	<form id="form" action="" method="post" autocomplete="off">
		<p><label for="">Instalado <?php echo $total;?> items. Elimine la carpeta install.</label></p></p>
	</form>
	</div>
	<div id="pie" class="tac">Sistema de Gesti&oacute;n de Contenidos <a href="http://www.aramateix.es" title="&iquest;Necesitas un Sitio Web?">Aramateix.es</a></div>
</div><!-- fin contenedor -->
</div>
<?php	
}else{?>
<div id="envoltura">
<div id="contenedor" class="curva">
	<div id="cabecera" class="tac">
		<h1>Installador de Aramateix.es</h1>
	</div>
	<div id="cuerpo">
	<form id="form" action="" method="post" autocomplete="off">
            
        <p><label for="usuario">Usuario:</label></p>
        <p class="mb10"><input name="usuario" type="text" id="usuario" autofocus required value="root" /></p>
		
        <p><label for="contrasenia">Contrase&ntilde;a:</label></p>
		<p class="mb10"><input name="contrasenia" type="text" id="contrasenia" required value="123456" /></p>
        
		<p><label for="base_datos">Base de Datos:</label></p>
		<p class="mb10"><input name="base_datos" type="text" id="contrasenia" required value="inventabcn" /></p>
                
		<p><input name="submit" type="submit" id="submit" value="Instalar" class="boton" /></p>
	</form>
	</div>
	<div id="pie" class="tac">Sistema de Gesti&oacute;n de Contenidos <a href="http://www.aramateix.es" title="&iquest;Necesitas un Sitio Web?">Aramateix.es</a></div>
</div><!-- fin contenedor -->
</div>
<?php }?>
</body>
</html>
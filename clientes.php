<html>
<head>
<link href="materias.png" type="image/x-icon" rel="shortcut icon"/>
<title>
CLIENTES
</title>

<script language="javascript">

function validar(form){
	var cad="",cont=0;
	var ide=form.idecli_cli.value;


	if(isNaN(ide)){
		cad+="* Ingrese solo digitos \n";
		cont=1;
	}

	else if(ide.length<6){
		cad+="* Minimo 6 digitos \n";
		cont=1;
	}
	
	if(cont==1){
		alert(cad);
        exit;
        }

	if(cont==0)
		form.submit();
}

function cambiar(c){
    if(c==1){
        var cam= document.getElementById("siguiente")
        cam.src="siguiente.png"
    }
    if(c==2){
        var cam= document.getElementById("volver")
        cam.src="volver.png"
    }
}

function cambiar2(c){
    if(c==1){
        var cam= document.getElementById("siguiente")
        cam.src="siguiente2.png"
    }
    if(c==2){
        var cam= document.getElementById("volver")
        cam.src="volver2.png"
    }
}

</script>

</head>
<body background="FONDO4.jpg">

<center>
<span style="color:black; font-size:50px;">CLIENTES</span>;

<br />
<br />

<?php
@ $conexion=mysql_connect("localhost","root","");
if(!$conexion){
echo "Error: No se ha podido conectar la base de datos";
exit;
}
mysql_select_db("confecciones_mary",$conexion);
?>

<table align="center" border="6" bordercolor="black" cellspacing="10" cellpadding="10">
<form  method="post" action="cliente.php">


<td align="right" bgcolor="#cccccc"><b>Identificacion:</b></td>
<td align="left"><input type="text" name="idecli_cli" value="" size="10" maxlength="10"/></td><tr>

</form>
<td align="center"><input type="image" id="siguiente" value="Enviar" src="siguiente2.png" onClick="validar(document.forms[0])" onMouseOut="cambiar2(1)" onMouseover="cambiar(1)"  alt="Siguiente"/></td>
<td align="center"><a href="menu.php"><img src="volver2.png" id="volver" border="0" onMouseOut="cambiar2(2)" onMouseover="cambiar(2)" alt="Volver"/> </a>
</table>
</body>
</html>

<html>
<head>

<title>
USUARIOS
</title>

<script language="javascript">

function validar(form){
	var cad="",cont=0;
	var ide=form.ideemp_emp.value;
	var con=form.contra_emp.value;
    
	
        if(ide==""){
		cad+="* IDENTIFICACION:\t\tSeleccione una identificacion\n";
		cont=1;
	}

	if(con.length<6){
		cad+="* CONTRASEÑA:\t\tMinimo 6 digitos\n";
		cont=1;
	}
    
	if(cont==1){
		alert(cad);
        exit;
        }
    
	if(cont==0){	  
 		form.submit();
	}	   
}

function cambiar(c){
    if(c==1){
        var cam= document.getElementById("acceso")
        cam.src="acceso.png"
    }
    if(c==2){
        var cam= document.getElementById("volver")
        cam.src="volver.png"
    }
}

function cambiar2(c){
    if(c==1){
        var cam= document.getElementById("acceso")
        cam.src="acceso2.png"
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
USUARIOS
</center>
<br />
<br />
<table align="center" border="6" bordercolor="black" cellspacing="10" cellpadding="10">
<form  method="post" action="acceso_verifica.php">

<td align="left" bgcolor="#cccccc"><b>Indentificacion:</b></td>
<td align="left">
<select name="ideemp_emp">
      	<option>Seleccione Identificacion</option>
      	<?php
   	$conexion=mysql_pconnect("localhost","root","");
	mysql_select_db("confecciones_mary",$conexion);
  	$consulta="SELECT * FROM empleados ORDER BY ideemp_emp";
  	$resultado=mysql_query($consulta);
  	$numero_resultados=mysql_num_rows($resultado);
  
  	for($i=0;$i<$numero_resultados;$i++){
    		$registro=mysql_fetch_array($resultado);
    		echo '<option value="'.$registro['ideemp_emp'].'" >'.$registro['ideemp_emp'].'</option>\n';
    	} 					
	mysql_close($bd);
    	?>
</select>
</td>
</tr>

<td align="left" bgcolor="#cccccc"><b>Contraseña:</b></td>
<td align="left"><input type="password" name="contra_emp" value="" size="10" maxlength="10"/></td><tr>

</form>
<td align="center"><input type="image" id="acceso" value="Enviar" src="acceso2.png" onClick="validar(document.forms[0])" onMouseOut="cambiar2(1)" onMouseover="cambiar(1)" alt="Enviar"/></td>
<td align="center"><a href="acceso.php"><img src="volver2.png" id="volver" onMouseOut="cambiar2(2)" onMouseover="cambiar(2)" border="0" alt="Volver"/> </a>
</table>
</body>
</html>
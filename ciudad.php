?>

<html>
<head>
<link href="materias.png" type="image/x-icon" rel="shortcut icon"/>
<title>CIUDAD</title>

<script language="javascript">

function validar(form){
	var cad="",cont=0;
	var ciu=form.ciudad_ciu.value;
    
    if(ciu.length<4){
		cad+="* CIUDAD:   Minimo 4 caracteres\n";
		cont=1;
	}
    
    else if(!valida_alfabeto(ciu)){
		cad+="* CIUDAD:   Ingrese solo caracteres\n";
		cont=1;
	}
	
	if(cont==1){
		alert(cad);
        exit;
        }

	if(cont==0){
        form.action="ciudad_guardar.php"
		form.submit();
    }
}
function valida_alfabeto(cadena){
	var res=0;
	for(var i=0; i<cadena.length; i++){
	if((cadena.charCodeAt(i)>=65 && cadena.charCodeAt(i)<=90) || (cadena.charCodeAt(i)>=97 && cadena.charCodeAt(i)<=122) || (cadena.charCodeAt(i)==32)){
		res=1;				
	}
	else {
		res=0;
		break;
	}
	}
	if(res==1){
		return true;
	}
	else{
		return false;
	}
}
function eliminar(form){
	form.action="ciudad_eliminar.php";
	form.submit();
}


function cambiar(c){
    if(c==1){
        var cam= document.getElementById("volver")
        cam.src="volver.png"
    }
    if(c==2){
        var cam= document.getElementById("guardar")
        cam.src="guardar.png"
    }
    if(c==3){
        var cam= document.getElementById("modificar")
        cam.src="modificar.png"
    }
    if(c==4){
        var cam= document.getElementById("eliminar")
        cam.src="eliminar.png"
    }
}

function cambiar2(c){
    if(c==1){
        var cam= document.getElementById("volver")
        cam.src="volver2.png"
    }
    if(c==2){
        var cam= document.getElementById("guardar")
        cam.src="guardar2.png"
    }
    if(c==3){
        var cam= document.getElementById("modificar")
        cam.src="modificar2.png"
    }
    if(c==4){
        var cam= document.getElementById("eliminar")
        cam.src="eliminar2.png"
    }
}


</script>

</head>

<body background="FONDO4.jpg">

<center>
CIUDAD
</center>

<?php
	$conexion=mysql_pconnect("localhost","root","");
	mysql_select_db("confecciones_mary",$conexion);
	
    $ciuing="ciudades";
    $ciumod="ciudades_modificar";
    $ciueli="ciudades_eliminar";
    
    require_once "permisos_validar.php";
    
	$result=mysql_query("select * from ciudades",$conexion);
	$existe=false;
	while($reg=mysql_fetch_array($result)){
		if($reg['codciu_ciu']==$_POST['codciu_ciu'])
			$existe=true;
	}
    
	if(!$existe){
        
        if(verificar($ciuing)==31){
            ?>
            <br />
            <br />
            <form name="clientes" method="post">
            <table align="center" border="6" bordercolor="black" cellspacing="10" cellpadding="10">
    
    
            <td align="left" bgcolor="#cccccc"><b>Codigo:</b></td>
            <td align="left"><input type="text" name="codciu_ciu" value="<?php $codciu_ciu=$_POST['codciu_ciu']; echo $codciu_ciu;?>" readonly="true" size="10" maxlength="10"/></td>
            <tr>
            <td align="left" bgcolor="#cccccc"><b>Ciudad:</b></td>
            <td align="left"><input type="text" name="ciudad_ciu" value="" size="20" maxlength="20"/></td>
            <tr>
            
            </form>
            <td align="center"><input type="image" id="guardar" value="Guardar" src="guardar2.png" onClick="validar(document.forms[0])" onMouseOut="cambiar2(2)" onMouseover="cambiar(2)" alt="Guardar"/></td>
            <td align="center"><a href="ciudades.php"><img src="volver2.png" id="volver" border="0" onMouseOut="cambiar2(1)" onMouseover="cambiar(1)" alt="Volver"/> </a></td>
            </table>
            <?php
        }
    }
    
    else if($existe){
   	    $result=mysql_query("select * from ciudades where codciu_ciu=\"$_POST[codciu_ciu]\"",$conexion);
       	$reg=mysql_fetch_array($result); 
        ?>
        
        <br />
        <br />
        <table align="center" border="6" bordercolor="black" cellspacing="10" cellpadding="10">
        <form name="clientes" method="post" action="ciudad_modificar.php">
        
        <td align="left" bgcolor="#cccccc"><b>Codigo:</b></td>
        <td align="left"><input type="text" name="codciu_ciu" value="<?php echo$reg['codciu_ciu']; ?>" readonly="true" size="10" maxlength="10"/> </td>
        <tr>
        <td align="left" bgcolor="#cccccc"><b>Ciudad:</b></td>
        <td align="left"><input type="text" name="ciudad_ciu" value="<?php echo$reg['ciudad_ciu']; ?>" readonly="true" size="20" maxlength="20"/></td>
        <tr>
        
        </form>
        
        <?php
        if(verificar($ciumod)==32){
        ?>
        <td align="center"><input type="image"id="modificar" value="Modificar" src="modificar2.png" onClick="document.forms[0].submit()" onMouseOut="cambiar2(3)" onMouseover="cambiar(3)" alt="Modificar"/></td>
        <?php
        }
        
        if(verificar($ciueli)==33){
        ?>
        <td align="center"><input type="image" id="eliminar" value="Eliminar" src="eliminar2.png" onClick="eliminar(document.forms[0])" onMouseOut="cambiar2(4)" onMouseover="cambiar(4)" alt="Eliminar"/></td>
        <tr>
        <?php
        }
        ?>
        <td colspan="2" align="center"><a href="ciudades.php"><img src="volver2.png" id="volver" border="0" onMouseOut="cambiar2(1)" onMouseover="cambiar(1)" alt="Volver"/></a></td>
        </table>   
    <?php
    }
?>

</body>
</html>
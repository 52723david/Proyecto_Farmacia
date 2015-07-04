<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../modelo/estiloss.css">
	<link rel="stylesheet" type="text/css" href="estilos/estilos.css">
	<link href="estilos/stacktable.css" rel="stylesheet" />
	<link href="estilos/style.css" rel="stylesheet" />
</head>
<body>

<?php
//header('Content-Type: text/html; charset=ISO-8859-1');
class clase_mysql{
	var $baseDatos;
	var $servidor;
	var $usuario;
	var $clave;
	/*identiicadores de conexion y consulta*/
	var $conexio_ID;
	var $consulta_ID;
	/*numero de error y error de texto*/
	var $Errno=0;
	var $Error="";
	function clase_mysqul(){
		//constructor
	}
	function conectar($db,$host,$user,$pass){
		if ($db!="") $this->baseDatos=$db;
		if ($host!="") $this->servidor=$host;
		if ($user!="") $this->usuario=$user;
		if ($pass!="") $this->clave=$pass;
		/*conectamos al servidor*/
		$this->conexio_ID=mysql_connect($this->servidor,$this->usuario,$this->clave);
		if (!$this->conexio_ID) {
			$this->Error="conexion fallida";
			return 0;
		}
		//seleccionamos la base de datos
		if (!mysql_select_db($this->baseDatos,$this->conexio_ID)) {
			$this->Error="Imposible abrir".$this->baseDatos;
		}
		/*si todo sale bien*/
		return $this->conexio_ID;
	}
	//Ejecuta cualquier consulta
	function consulta($sql=""){
		if ($sql=="") {
			$this->Error="no hay ningun sql";
			return 0;
		}
		//ejecutamos la consulta
		$this->consulta_ID=mysql_query($sql,$this->conexio_ID);
		if (!$this->consulta_ID) {
			$this->Error=mysql_errno();
			$this->Error=mysql_error();
		}
		//si todo sale bien
		return $this->consulta_ID;
	}
	//devuelve el numero de campos de la consulta
	function numcampos(){
		return @mysql_num_fields($this->consulta_ID);
	}
	//devuelve el numero de registros
	function numregistros(){
		return mysql_num_rows($this->consulta_ID);
	}
	//devuelve el nombre de un campo de la consulta
	function nombrecampo($numcampo){
		return mysql_field_name($this->consulta_ID, $numcampo);
	}
	//muestra los resultados de la consulta
	function verconsulta($r, $f, $t){
		echo "<table id='card-table' class='table' align='center' whidth=100% aligen='center' border=1>";
		echo "<tr>";
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			echo "<th>".$this->nombrecampo($i)."</th>";
		}
		echo "<th></th>";
		echo "</tr>";
		while (@$row=mysql_fetch_array($this->consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < $this->numcampos(); $i++) {
				if ($this->nombrecampo($i)!=$f) {
				 	echo "<td>".$row[$i]."</td>";
				 } 
				if ($this->nombrecampo($i)==$f) {
				 	echo "<td>".$r."</td>";
				 	//echo "<td>".$t."</td>";
				 }
			}
			$us=end( $row );
			$cer=$row[0];
			$tabla = mysql_field_table ( $this->consulta_ID, 0);
			$nom=$row[1];
			//echo "$cer"; 
			//echo "<td><a href='../view/menu/usuario.php?id=$row[0]&var=actualizar&va=$t&tab=$tabla'>Actualizar</a></td>";
			//echo "<td><a href='../controller/admin1.php?id=$row[0]&va=borrar&var=$tabla&ht=$us'>Borrar</a></td>";
			echo "<td>";
			?>
			<div align="center" id="header1">
				<ul class="nav1">
					<li><a href="">Opciones</a>
						<ul>
						<?php
							echo "<li><a href='administrador.php?id=$row[0]&var=actualizar&va=$cer&tab=$tabla'>Actualizar</a>";
							echo "<li><a href='../../controlador/admin1.php?id=$row[0]&va=$cer&var=borrarfarmacia&tab=$tabla&nomb=$nom'>Borrar</a>";
						?>
						</ul>
					</li>
				</ul>
			</div>
			<?php
			echo "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	function detalles(){
		echo "<table id='card-table' class='table' align='center' whidth=100% aligen='center' border=1>";
		echo "<tr>";
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			echo "<th>".$this->nombrecampo($i)."</th>";
		}
		//echo "<td></td>";
		//echo "<td></td>";
		echo "</tr>";
		while (@$row=mysql_fetch_array($this->consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < $this->numcampos(); $i++) {
				 echo "<td>".$row[$i]."</td>";
			}
			//$us=end( $row );
			//$tabla = mysql_field_table ( $this->consulta_ID, 0); 
			//echo "<td><a href='../view/menu/usuario.php?id=$row[0]&var=actualizar&va=$t&tab=$tabla'>Actualizar</a></td>";
			//echo "<td><a href='../controller/admin1.php?id=$row[0]&va=borrar&var=$tabla&ht=$us'>Borrar</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	function ver($r, $f){
		echo "<table id='card-table' class='table' align='center' whidth=100% aligen='center' border=1>";
		echo "<tr>";
		for ($i=0; $i < $this->numcampos() ; $i++) {
		if ($this->nombrecampo($i)!="Id" and $this->nombrecampo($i)!="Foto" and $this->nombrecampo($i)!="Descripcion" and $this->nombrecampo($i)!="Zona" and $this->nombrecampo($i)!="Provincia" and $this->nombrecampo($i)!="Canton" and $this->nombrecampo($i)!="Latitud" and $this->nombrecampo($i)!="Longitud" and $this->nombrecampo($i)!="Usuario") {
			echo "<th>".$this->nombrecampo($i)."</th>";
		 } 
		}
		echo "<th>Opciones</th>";
		echo "</tr>";
		while (@$row=mysql_fetch_array($this->consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < $this->numcampos(); $i++) {
				if ($this->nombrecampo($i)!=$f) {
					/*if ($this->nombrecampo($i)=="Nombre") {
						echo "<td><a href='../view/menu/usuario.php?var=ver&va=$row[13]&yur=$row[0]&yu=$row[1]'>".$row[$i]."</a></td>";
					}*/
					if ($this->nombrecampo($i)!="Usuario" and $this->nombrecampo($i)!="Id" and $this->nombrecampo($i)!="Foto" and $this->nombrecampo($i)!="Descripcion" and $this->nombrecampo($i)!="Zona" and $this->nombrecampo($i)!="Provincia" and $this->nombrecampo($i)!="Canton" and $this->nombrecampo($i)!="Latitud" and $this->nombrecampo($i)!="Longitud") {
						echo "<td>".$row[$i]."</td>";
					}
				 	
				 } 
				$ID=$row[0];
				$CE=$row[13];
				$tabla = mysql_field_table ( $this->consulta_ID, 0);
				if ($this->nombrecampo($i)==$f) {
				 	//echo "<td><a href='../view/menu/usuario.php'>".$r."</a></td>";
				 	//echo "<td><a href='../Administrador/administrador.php?var=detalle&r=$ID&t=$tabla&va=$CE'>Detalle</a></td>";
				 }
			}
			$user=end( $row );
			$nom=$row[1];
			//echo "$user";
			$tabla = mysql_field_table ( $this->consulta_ID, 0); 
			//echo "<td><a href='../Administrador/administrador.php?id=$row[0]&var=actualizarFarmacia&va=$user&tab=$tabla'>Actualizar</a></td>";
			//echo "<td><a href='../../controller/admin1.php?id=$row[0]&va=$user&var=borrarfarmacia&tab=$tabla&nomb=$nom'>Borrar</a></td>";
			echo "<td>";
			?>
			<div align="center" id="header1">
				<ul class="nav1">
					<li><a href="">Opciones</a>
						<ul>
						<?php
							echo "<li><a href=''>Productos</a>";
							echo "<li><a href=''>Turnos</a>";
							echo "<li><a href='../Administrador/administrador.php?var=detalle&r=$ID&t=$tabla&va=$CE'>Detalles</a>";
							echo "<li><a href='../Administrador/administrador.php?id=$row[0]&var=actualizarFarmacia&va=$user&tab=$tabla'>Actualizar</a>";
							echo "<li><a href='../../controlador/admin1.php?id=$row[0]&va=$user&var=borrarfarmacia&tab=$tabla&nomb=$nom'>Borrar</a>";
						?>
						</ul>
					</li>
				</ul>
			</div>
			<?php
			echo "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	
	function consulta_lista(){
		$posicion=0;
		$vector="";
		while ($row = mysql_fetch_array($this->consulta_ID)) {
			for ($i=0; $i < $this->numcampos(); $i++) { 
				$vector[$posicion]=$row[$i];
				$posicion++;
			}				
		}
		return $vector;
	}
	function validar($r){
		//echo "$r";
		if ($row=mysql_fetch_array($this->consulta_ID)) {
		  session_start();//Inicializamos sesion
		  $_SESSION['usuario']=$row["Usuario"];
		  $_SESSION['password']=$row["Password"];
		  $cedula=$row["Cedula"];
		  if ($r=="user") {
		  	echo "<script>location.href='../vista/Administrador/administrador.php?va=$cedula&var=ver'</script>";
		  }else{
		  	echo "<script>location.href='../view/admin.php?va=$cedula'</script>";
		  }
		}else{
		  echo "<script>alert('usuario y contraseña ingresados incorrectos')</script>";
		  echo "<script>location.href='../vista/Login/login.php'</script>";
		}
	}
	function actualizar($sd){
      while ($row=mysql_fetch_array($this->consulta_ID)) {
      	$c=@$row[13];
      	echo "<div class='wrapper'>";
		echo "<div id='main' style='padding:50px 0 0 0;'>";
        echo @"<form id='contact-form' action='../../controlador/admin1.php?va=actualizar&nom=$sd&io=$c&ad=$row[0]' method='post'>";
        for ($i=0; $i < $this->numcampos(); $i++) { 
          if ($this->nombrecampo($i)=="Id" or $this->nombrecampo($i)=="Usuario" or $this->nombrecampo($i)=="Farmacia" or $this->nombrecampo($i)=="Password") {
            echo "<input type='hidden' name='".$this->nombrecampo($i)."'value='".$row[$i]."'>";
          }
          if ($this->nombrecampo($i)=="Foto") {
            echo "<input type='file' name='".$this->nombrecampo($i)."'>";
          }
          if ($this->nombrecampo($i)!="Id" and $this->nombrecampo($i)!="Usuario" and $this->nombrecampo($i)!="Farmacia" and $this->nombrecampo($i)!="Foto" and $this->nombrecampo($i)!="Password") {
            echo "<input type='text' name='".$this->nombrecampo($i)."'value='".$row[$i]."'>";
          }
        }
        echo "<input type='submit' id='boton' name='btn_enviar' value='Enviar'>";
        echo "</form>";
        echo "</div>";
	    echo "</div>";
      }
	}
} 
?>
</body>
</html>
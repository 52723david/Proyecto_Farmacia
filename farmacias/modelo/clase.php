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
		echo "<table align='center' whidth=100% aligen='center' border=1>";
		echo "<tr>";
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			echo "<td>".$this->nombrecampo($i)."</td>";
		}
		echo "<td></td>";
		echo "<td></td>";
		echo "</tr>";
		while (@$row=mysql_fetch_array($this->consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < $this->numcampos(); $i++) {
				if ($this->nombrecampo($i)!=$f) {
				 	echo "<td>".$row[$i]."</td>";
				 	//echo "<td>".$t."</td>";
				 } 
				if ($this->nombrecampo($i)==$f) {
				 	echo "<td>".$r."</td>";
				 	//echo "<td>".$t."</td>";
				 }
				 //echo "<td>".$t."</td>";
			}
			//echo $t;
			$us=end( $row );
			$tabla = mysql_field_table ( $this->consulta_ID, 0);
			$er=$row[0]; 
			$nom=$row[1];
			//echo $nom;
			echo "<td><a href='../iu/usuario.php?id=$row[0]&var=actualizar&va=$t&tab=$tabla'>Actualizar</a></td>";
			if ($tabla=="usuarios") {
				//echo "<td>$tabla</td>";
				echo "<td><a href='../iu/usuario.php?va=$er&var=borrarfarmacia&tab=$tabla&nomb=$nom'>Borrar</a></td>";
			}else{
				echo "<td><a href='../logica/admin1.php?id=$row[0]&va=borrar&var=$tabla&ht=$us'>Borrar</a></td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}

	function ver($r, $f, $t){
		echo "<table align='center' whidth=100% aligen='center' border=1>";
		echo "<tr>";
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			echo "<td>".$this->nombrecampo($i)."</td>";
		}
		echo "<td></td>";
		echo "<td></td>";
		echo "</tr>";
		while (@$row=mysql_fetch_array($this->consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < $this->numcampos(); $i++) {
				if ($this->nombrecampo($i)!=$f) {
					if ($this->nombrecampo($i)=="Nombre") {
						echo "<td><a href='../iu/usuario.php?var=ver&va=$row[13]&yur=$row[0]&yu=$row[1]'>".$row[$i]."</a></td>";
					}
					if ($this->nombrecampo($i)!="Nombre" and $this->nombrecampo($i)!="Usuario") {
						echo "<td>".$row[$i]."</td>";
					}
				 } 
				if ($this->nombrecampo($i)==$f) {
				 	echo "<td><a href='../iu/usuario.php?va=$t&var=usuario'>".$r."</a></td>";
				 	//echo "$t";
				 	//echo "<td><a href='../iu/usuario.php'>".$row[13]."</a></td>";
				}
			}
			$user=end( $row );
			$nom=$row[1];
			//echo "$nom";
			$tabla = mysql_field_table ( $this->consulta_ID, 0); 
			echo "<td><a href='../iu/usuario.php?id=$row[0]&var=actualizar&va=$user&tab=$tabla'>Actualizar</a></td>";
			echo "<td><a href='../iu/usuario.php?id=$row[0]&va=$user&var=borrarfarmacia&tab=$tabla&nomb=$nom'>Borrar</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	}

	function arregloDatos(){
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
		if ($row=mysql_fetch_array($this->consulta_ID)) {
		  session_start();//Inicializamos sesion
		  $_SESSION['usuario']=$row["Usuario"];
		  $_SESSION['password']=$row["Password"];
		  $cedula=$row["Cedula"];
		  if ($r=="user") {
		  	echo "<script>location.href='../iu/usuario.php?va=$cedula'</script>";
		  }else{
		  	echo "<script>location.href='../iu/admin.php?va=$cedula'</script>";
		  }
		}else{
		  echo "<script>alert('usuario y contraseña ingresados incorrectos')</script>";
		  echo "<script>location.href='../iu/index.php'</script>";
		}
	}
} 
?>
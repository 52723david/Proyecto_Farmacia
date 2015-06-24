<html>
<head>
	<html lang="es">
	<title>Tu Farmacia Cerca de todo</title>
	<link rel="shortcut icon" href="images/etiqueta.jpg" type="image/jpg">
	<link rel="stylesheet" type="text/css" href="estilos/estilos.css" media="all">
	<link rel="stylesheet" type="text/css" href="estilos/fonts.css" media="all">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="js/bjqs.min.js"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="menu/rmm-css/responsivemobilemenu.css" type="text/css"/>
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
	<script type="text/javascript" src="menu/rmm-js/responsivemobilemenu.js"></script>

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<!-- Datepicker -->
	<link rel="stylesheet" href="estilos/jquery-ui.css" />
	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script>
		$(function () {
		$("#datepicker").datepicker();
		});
	</script>
	<!-- Fin Datepicker -->

	<!-- Google Maps -->
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<script>
		function initialize() {
		  var mapProp = {
		    center:new google.maps.LatLng(-3.983493, -79.199924),
		    zoom:9,
		    mapTypeId:google.maps.MapTypeId.ROADMAP
		  };
		  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
		}
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
	<!-- Fin Google maps -->

	<!--script src="http://code.jquery.com/jquery-latest.js"></script>-->
	<script src="js/menu.js"></script>
     <!-- Opcional, importamos una fuente a gusto -->
</head>
<body>
<div class="contenedor">
	<header>
		<div class="logo">
			<a href="index.php"><img src="images/logo.png"></a>	
		</div>
		<div class="logo_login">
			<a href="index.php"><img src="images/login.png" width="100" heigth="100"></a>
		</div>
		<div class="buscador">
			<fieldset class="searchform">
				<input type="text" value="Buscar..." class="searchfield" onfocus="if (this.value == 'Buscar...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Buscar...';}"/> 
				<input type="button" value="Ir" class="searchbutton"/>
			</fieldset>
		</div>
		
	</header>
	<div id="slider">
        <ul class="bjqs">
            <li>
                <img src="images/farmacia1.jpg" alt=""/>
            </li>
            <li>
                <img src="images/farmacia2.jpg" alt=""/>
            </li>
            <li>
                <img src="images/farmacia3.jpg" alt=""/>
            </li>
        </ul>
    </div>
	<!--Menu-->
	<nav class="menu">
		<div class="rmm"  data-menu-style = "sapphire">
            <ul>
                <li><a href='#home'>Inicio</a></li>
                <li><a href='#about-me'>Ubicación</a></li>
                <li><a href='#gallery'>Contacto</a></li>
                <li><a href='#blog'>Farmacias</a></li>
                <li><a href='#home'>Inicio</a></li>
                <li><a href='#about-me'>Ubicación</a></li>
                <li><a href='#gallery'>Contacto</a></li>
                <li><a href='#blog'>Farmacias</a></li>
            </ul>
        </div>
	</nav>
	
	<section>
		<div class="titulo">
			<h1>FARMACIAS DE TURNO</h1>
		</div>
			<div id="datepicker"></div>
		
		<br>
		<div class="select">
			<select class="mySelect" size="8">
			  <option>Farmacia Cruz Azul</option>
			  <option>Farmacia Pichincha</option>
			  <option>Farmacia Bolivar</option>
			  <option>Farmacia Auxiliadora</option>
			  <option>Farmacia Mayorista</option>
			  <option>Farmacia Sana Sana</option>
			  <option>Farmacia Cruz Farmacia</option>
			  <option>Farmacia Santa Elena</option>
			  <option>Farmacia Bolivar</option>
			  <option>Farmacia Auxiliadora</option>
			  <option>Farmacia Mayorista</option>
			  <option>Farmacia Sana Sana</option>
			  <option>Farmacia Cruz Farmacia</option>
			  <option>Farmacia Santa Elena</option>
			</select>
		</div>
	</section>
	<aside>
			<div id="googleMap"></div>
		
	</aside>

	<footer>
			<h6>Visitanos en Nuestras Redes Sociales</h6>
			<a href="#"><img src="images/twitter.png" width="25px" heigth="25px"  alt=""/></a>	
			<a href="#"><img src="images/facebook.png" width="25px" heigth="25px"  alt=""/></a>	
		
		
	</footer>

</div>	
</body>
</html>
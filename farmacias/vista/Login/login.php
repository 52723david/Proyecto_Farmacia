<html>
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
    
    <script type="text/javascript">
    function openVentana(){
      $(".ventana").slideDown("slow");
    }
    function closeVentana(){
      $(".ventana").slideUp("fast");
    }
    </script>


    

    <meta charset="UTF-8">
    <title>Ingresar</title>
    
    
    <link rel="stylesheet" href="../estilos/style.css">

    <link rel='stylesheet prefetch' href='http://daneden.github.io/animate.css/animate.min.css'>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,400italic,700italic,700'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="../estilos/style.css">

</head>
<?php
session_start();
session_destroy();
?>
<body>

<div class='info'>
</div>
<div class='form aniamted bounceIn'>
  <div class='switch'>
    <i class='fa fa-pencil fa-times'></i>
    <div class='tooltip'>Registrese</div>
  </div>
  <div class='login'>
    <h2>Accede a tu cuenta</h2>




    <form action="../../controlador/admin1.php?va=loguin" method="post" name="form">
     <table>
          <tr>
            <td><p></p></td>
            <td><input type="text" name="usuario" placeholder="usuario" required></td>
          </tr>
          <tr>
            <td><p></p></td>
            <td><input type="password" name="clave" placeholder="clave" required></td>
          </tr>
          <tr>
            <td><p></p></td>
            <td><select name="tipo">
              <option value="user">Usuario</option>
              <option value="admin">Administrador</option>
            </select></td>
          </tr>
        </table>
        <tr>
            <td></td>
            <button><input type="submit" id="boton" name="btn_enviar" value="Enviar"></button>
          </tr>

                       
     <!-- <button>Login</button>-->
    </form>
  </div>

 



  <div class='register'>
    <h2>Crear una cuenta</h2>
   
    <form action="../../controller/admin1.php?va=registrarse" method="post" name="form">
        <table>
          <tr>
            <td><p></p></td>
            <td><input type="text" name="Cedula" placeholder="Cédula" required></td>
          </tr>
          <tr>
            <td><p></p></td>
            <td><input type="text" name="Nombres" placeholder="Nombres" required></td>
          </tr>
          <tr>
            <td><p></p></td>
            <td><input type="text" name="Apellidos" placeholder="Apellidos" required></td>
          </tr>
          <tr>
            <td><p></p></td>
            <td><input type="text" name="Foto" placeholder="Foto"></td>
          </tr>
          <tr>
            <td><p></p></td>
            <!--<td><input type="text" name="Mail" placeholder="Mail"></td>-->
            <td><input type="email" name="Mail" placeholder="ejemplo@mail.com" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required> </td>
          </tr>
          <tr>
            <td><p></p></td>
            <td><input type="text" name="Celular" placeholder="Celular"></td>
          </tr>
          <tr>
            <td><p></p></td>
            <td><input type="text" name="Usuario" placeholder="Usuario" required></td>
          </tr>
          <tr>
            <td><p></p></td>
            <td><input type="password" name="Password" placeholder="Password" required></td>
          </tr>
        </table>  

        <tr>
            <td></td>
            <button><input type="submit" id="boton" name="btn_enviar" value="Enviar"></button>
          </tr>
  
      </form>
  </div>
  <footer>
    <a href='login.php'>Has olvidado tu contraseña?</a>
  </footer>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="../js/index.js"></script>
</body>
</html>

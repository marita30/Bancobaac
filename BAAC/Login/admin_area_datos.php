<!doctype html>
<html lang="en">
<head>

    <?php 
     session_start();
    include('db.php');

   if(isset($_SESSION['usuario_nombre']) || isset($_SESSION['IDcargo']) || isset($_SESSION['fecha_g']) || isset($_SESSION['id'])) 
   {
        $nombre = $_SESSION['usuario_nombre'];
        $id = intval($_SESSION['id']);
    }

     $consulta = "SELECT personal.id_socio, personal.nombre, personal.n_cedula, personal.telefono, personal.direccion, usuario.usuario_nombre FROM usuario JOIN personal ON usuario.id_usuario=personal.id_socio where estado = 'activo' AND IDcargo = 3";
            $sql = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");


            while ($fila = mysqli_fetch_array($sql))
          { 

             $idV=$fila['id_socio'];
             $nombreV = $fila['nombre'];
            $cedulaV = $fila['n_cedula'];
            $telefonoV = $fila['telefono'];
            $direccionV = $fila['direccion'];
            $usuarioV=$fila['usuario_nombre'];
             
          }          //FIN DEL WHILE     
        if(isset($_POST['registrar'])) {


          /** $Nombre  = mysql_real_escape_string($_POST['nombre']);
            $Cedula   = mysql_real_escape_string($_POST['cedula']);
            $Celular = intval($_POST['telefono']);
            $Direccion  = mysql_real_escape_string($_POST['direccion']);
            $usuario_nombre = mysql_real_escape_string($_POST['usuario_nombre']);
            $usuario_clave = mysql_real_escape_string($_POST['usuario_clave']);*/

             $Nombre  = $_POST['nombre'];
              $Cedula   = $_POST['cedula'];
              $Celular  = intval($_POST['telefono']);
              $Direccion   = $_POST['direccion'];
              $usuario_nombre   = $_POST['usuario_nombre'];
              $usuario_clave   = $_POST['usuario_clave'];


            $consulta2 = "UPDATE personal SET estado= 'inactivo' WHERE id_socio = $idV";
            $sql2 = mysqli_query( $conexion, $consulta2) or die ( "Algo ha ido mal en la consulta a la base de datos");

// deshabilitar el administrador de reunion anterior
                if ($sql2){

                       echo "<script>
                            alert('Datos guardados!');
                            location.replace('admin_area_datos.php');
                          </script>
                        ";


                    } else {

                         echo "<script>
                            alert('No se pudo guardar los datos!');
                            location.replace('admin_area_datos.php');
                          </script>
                        ";


                    }

             $sql3=mysqli_query($conexion, "INSERT INTO personal (nombre, n_cedula, telefono, direccion, IDcargo, estado) VALUES ('$Nombre', '$Cedula','$Celular', '$Direccion', 3, 'activo')") or die("error insertar datos"); //agregar nuevo administrador de reunion
            if($sql3){

                 $consulta3 = "SELECT id_socio FROM  personal where estado = 'activo' AND IDcargo = 3";
            $sql4 = mysqli_query( $conexion, $consulta3 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
             while ($fila3 = mysqli_fetch_array($sql4))
          { 

             $idV3=$fila3['id_socio'];
             
          } 

           $sql5=mysqli_query($conexion, "INSERT INTO usuario (id_usuario, usuario_nombre, usuario_clave) VALUES ('$idV3', '$usuario_nombre','$usuario_clave')") or die("error insertar datos");

        }

                    
        }
        ?>

     <script src="js/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Arvo:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>

<script src="js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
 <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){     
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
            });
        });
    </script>
    <script>
            jQuery(function($){
            $('#cedula').mask('999-999999-9999a');
            $('#celular').mask('999-99999999');
            $('#apellido').mask('aa?aaaaaaaaaaaaaaaaaaaaaaaaaaa');
            $('#nombre').mask('aa?aaaaaaaaaaaaaaaaaaaaaaaaaaa');
    

            });

        </script>
     <!------ Light Box ------>
    <link rel="stylesheet" href="css/swipebox.css">
    <script src="js/jquery.swipebox.min.js"></script> 
    <script type="text/javascript">
        jQuery(function($) {
            $(".swipebox").swipebox();
        });
    </script>
    <!------ Eng Light Box ------>  
   <!-- <script src="js/jquery.min.js"></script>     -->
     <script src="js/validCampoFranz.js"></script>
       <script type="text/javascript">
            jQuery(function($){
                //Para escribir solo letras
                $('#nombre').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
                $('#apellido').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
                $('#tipo_afiliacion').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');

                //Para escribir solo numeros    
                $('#celular').validCampoFranz('0123456789');    
            });
        </script>

	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/placeholder.jpg">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>AAC</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!-- Bootstrap core CSS     -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/css/paper-kit.css?v=2.1.0" rel="stylesheet"/>

	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href="../assets/css/nucleo-icons.css" rel="stylesheet">

</head>
<body>
    <nav class="navbar navbar-expand-md fixed-top navbar-transparent" color-on-scroll="150">
        <div class="container">
			<div class="navbar-translate">
	            <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
	            </button>
                <a class="navbar-brand" href="">Bienvenido <?PHP echo $nombre;?></a>
	          <!--   <a class="navbar-brand" href="https://www.creative-tim.com">Bienvenido <?PHP //echo $nombre;?></a> -->
			</div>
			<div class="collapse navbar-collapse" id="navbarToggler">
	            <ul class="navbar-nav ml-auto">
	               <!--  <li class="nav-item">
	                    <a href="#" class="nav-link"><i class="fa fa-edit"></i>Registrar nuevo Socio</a>
	                </li> -->
	                
                    
                     <li class="nav-item">
                        <a href="admin_area.php" class="nav-link"><i class=" fa fa-balance-scale"></i>  Inicio</a>
                    </li>
                    
                   
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Finaliza Sesion" data-placement="bottom" href="logout.php">
                            <i class="fa fa-power-off"></i>
                            <!-- <p class="d-lg-none">GitHub</p> -->
                        </a>
                    </li>
	            </ul>
	        </div>
		</div>
    </nav>

    <div class="wrapper">
        <div class="page-header page-header-xs" data-parallax="true" style="background-image: url('../assets/img/productivas.jpg');">
			<div class="filter"></div>
		</div>
        <div class="section profile-content">
            <div class="container">
                <div class="owner">
                    <div class="avatar">
                        <img src="../assets/img/admin.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                    </div>
                    <!-- <div class="name">
                        <h4 class="title"><br /><?PHP echo $nombre;?></h4>
						<h6 class="description">Socios</h6>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <h3 style="color: #800000"> <?PHP echo $nombreV;?> Es el Actual Administrador de Reunion</h3> 
                        <br />
                        <!-- <btn class="btn btn-outline-default btn-round"><i class="fa fa-cog"></i> Settings</btn> -->
                    </div>
                </div>
                <br/>
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <!-- <a class="nav-link active" data-toggle="tab" href="#follows" role="tab">Follows</a> -->
                            </li>
                            <li class="nav-item">
                                 
                                <a class="nav-link" data-toggle="tab"  href="#following" role="tab">Informacion Personal</a>
                                <p style="color: #800000"> Cedula: <?PHP echo $cedulaV;?>  </p>
                                <p style="color: #800000"> Telefono/Celular: <?PHP echo $telefonoV;?>  </p>
                                <p style="color: #800000"> Direccion: <?PHP echo $direccionV;?>  </p>
                                 <p style="color: #800000"> Nombre de Usuario: <?PHP echo $usuarioV;?>  </p>

                                <btn class="btn btn-outline-default btn-round"><i class="fa fa-cog"></i> Modificar Datos de Administrador de Reunion</btn>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Tab panes -->
            
                    <div class="tab-pane text-center" id="following" role="tabpanel">
                        <div class="wrapper">
        <div class="page-header" style="background-color: ;">
            <div class="filter"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 ml-auto mr-auto">
                            <div class="card card-register" style="margin-top: ;">
                                <h4 style="color: #800000"  class="title"  >--Agregar Nuevo Administrador de Reunion--</h4>
                                <div class="social-line text-center">
                                   <!--  <a style="color: white;">Ingresa sus datos!</a> -->
                                </div>
                                <form class="register-form" method="post">
                                    <!-- <label>Membresia</label>
                                    <input type="text" class="form-control" placeholder="Ingrese la Membresia" name="multa" required=""> -->
                                   <label  style="color:#fff; " for="name">Nombre:</label>
                                    <input enable="" style="color:#800000; " type="text" class="form-control" value="" name="nombre" id="" required="">

                                     <label>Cedula</label>
                                    <input enable=""  style="color:#800000; " type="text" class="form-control" value="" name="cedula" id="cedula" required="">

                                    <label>Telefono</label>
                                    <input enable=""  style= "color:#800000; " type="text" class="form-control" value="" name="telefono" id="telefono" required="">

                                     <label>Direccion</label>
                                    <input  enable=""  style= "color:#800000; " type="text" class="form-control" value="" name="direccion" id="" required="">

                                     <label>Usuario</label>
                                    <input  enable=""  style= "color:#800000; " type="text" class="form-control" value="" name="usuario_nombre" id="" required="">
                                     <label>Contraseña</label>
                                    <input  enable=""  style= "color:#800000; " type="text" class="form-control" value="" name="usuario_clave" id="" required="">
                                    <button type="submit" name="registrar" class="btn btn-outline-default btn-round" ><i class="fa fa-cog"></i> Guardar Datos</button>

                                </form>
                               <!--  <div class="forgot">
                                    <a href="#" class="btn btn-link btn-danger">Olvidaste tu contraseña?</a>
                                    <a href="../index.html" style="color: white;" >Regresar</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
                    
                    </div>
                
                </div>
            </div>
        </div>
    </div>
	<footer class="footer section-dark">
        <div class="container">
            <div class="row">
                <nav class="footer-nav">
                   <!--  <ul>
                        <li><a href="https://www.creative-tim.com">Creative Tim</a></li>
                        <li><a href="http://blog.creative-tim.com">Blog</a></li>
                        <li><a href="https://www.creative-tim.com/license">Licenses</a></li>
                    </ul> -->
                </nav>
                <div class="credits ml-auto">
                    <span class="copyright">
                       &copy; <script>document.write(new Date().getFullYear())</script>, Ing. de software II <i class="fa fa-heart heart"></i>
                    </span>
                </div>
            </div>
        </div>
    </footer>
</body>


               







<!-- <!-- Core JS Files -->
<script src="../assets/js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<!-- <script src="../assets/js/tether.min.js" type="text/javascript"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
 -->

<!--  Paper Kit Initialization snd functons -->
<script src="../assets/js/paper-kit.js?v=2.1.0"></script>

</html>

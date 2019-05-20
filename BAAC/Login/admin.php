<!doctype html>
<html lang="en">
<head>

    <?php 
     session_start();
    include('db.php');

   if(isset($_SESSION['usuario_nombre']) || isset($_SESSION['IDcargo']) || isset($_SESSION['fecha_g'])) {
        $nombre = $_SESSION['usuario_nombre'];
        $cargo = $_SESSION['IDcargo'];
        $Fecha = $_SESSION['fecha_g'];
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
	<link rel="icon" type="image/png" href="../assets/img/pagar.png">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>AAC-Inicio</title>

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
			</div>
			<div class="collapse navbar-collapse" id="navbarToggler">
	            <ul class="navbar-nav ml-auto">
	               <!--  <li class="nav-item">
	                    <a href="#" class="nav-link"><i class="fa fa-edit"></i>Registrar nuevo Socio</a>
	                </li> -->
	                <li class="nav-item">
	                    <a href="R_B.php" class="nav-link"><i class="fa fa-handshake-o"></i>  Reunion Bancaria</a>
	                </li>
                  <!--   <li class="nav-item">
                        <a href="#" class="nav-link"><i class="fa fa-child"></i>  Prestamos</a>
                    </li> -->
                    <!--  <li class="nav-item">
                        <a href="#" class="nav-link"><i class=" fa fa-balance-scale"></i>  Abonos</a>
                    </li> -->
                    <!--  <li class="nav-item">
                        <a href="#" class="nav-link"><i class=" fa fa-balance-scale"></i>  Cuenta de ahorro</a>
                    </li> -->

					<!-- <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank">
                            <i class="fa fa-twitter"></i>
                            <p class="d-lg-none">Twitter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank">
                            <i class="fa fa-facebook-square"></i>
                            <p class="d-lg-none">Facebook</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
                            <i class="fa fa-instagram"></i>
                            <p class="d-lg-none">Instagram</p>
                        </a>
                    </li> -->
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
        <div class="page-header page-header-xs" data-parallax="true" style="background-image: url('../assets/img/fabio-mangione.jpg');">
			<div class="filter"></div>
		</div>
        <div class="section profile-content">
            <div class="container">
                <div class="owner">
                    <div class="avatar">
                        <img src="../assets/img/admin.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                    </div>
                    <div class="name">
                        <h4 class="title"><br /><?PHP echo $nombre;?></h4>
						<h6 class="description">Administrador de reuniones</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <p>An artist of considerable range, Jane Faker — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. </p>
                        <br />
                        <btn class="btn btn-outline-default btn-round"><i class="fa fa-cog"></i> Settings</btn>
                    </div>
                </div>
                <br/>
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#follows" role="tab">Follows</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#following" role="tab">Registrar Nuevo Socio</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Tab panes -->
                <div class="tab-content following">
                    <div class="tab-pane active" id="follows" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 ml-auto mr-auto">
                                <ul class="list-unstyled follows">
                                    <li>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2 ml-auto mr-auto">
                                                <img src="../assets/img/faces/clem-onojeghuo-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                            </div>
                                            <div class="col-md-7 col-sm-4  ml-auto mr-auto">
                                                <h6>Flume<br/><small>Musical Producer</small></h6>
                                            </div>
                                            <div class="col-md-3 col-sm-2  ml-auto mr-auto">
												<div class="form-check">
					                                <label class="form-check-label">
					                                    <input class="form-check-input" type="checkbox" value="" >
					                                    <span class="form-check-sign"></span>
					                                </label>
					                            </div>
                                            </div>
                                        </div>
                                    </li>
                                    <hr />
                                    <li>
                                        <div class="row">
                                            <div class="col-md-2 ml-auto mr-auto ">
                                                <img src="../assets/img/faces/ayo-ogunseinde-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                            </div>
                                            <div class="col-md-7 col-sm-4">
                                                <h6>Banks<br /><small>Singer</small></h6>
                                            </div>
                                            <div class="col-md-3 col-sm-2">
												<div class="form-check">
					                                <label class="form-check-label">
					                                    <input class="form-check-input" type="checkbox" value="">
					                                    <span class="form-check-sign"></span>
					                                </label>
					                            </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane text-center" id="following" role="tabpanel">
                        <div class="wrapper">
        <div class="page-header" style="background-color: ;">
            <div class="filter"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 ml-auto mr-auto">
                            <div class="card card-register" style="margin-top: ;">
                                <h3 class="title">Registrar Socio Nuevo!</h3>
                                <div class="social-line text-center">
                                    <a style="color: white;">Ingresa sus datos!</a>
                                </div>
                                <form class="register-form" method="post">
                                    <label>Membresia</label>
                                    <input type="text" class="form-control" placeholder="Ingrese la Membresia" name="multa" required="">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" placeholder="Ingrese el nombre" name="nombre" id="" required="">

                                     <label>Cedula</label>
                                    <input type="text" class="form-control" placeholder="Ingrese la cedula" name="cedula" id="cedula" required="">

                                    <label>Telefono</label>
                                    <input type="text" class="form-control" placeholder="Ingrese el telefono" name="telefono" id="celular" required="">

                                     <label>Direccion</label>
                                    <input type="text" class="form-control" placeholder="Ingrese la direccion" name="direccion" id="" required="">

                                     <label>Nombre del usuario</label>
                                    <input type="text" class="form-control" placeholder="Usuario" name="usuario_nombre" id="" required="">

                                    <label>Contraseña</label>
                                    <input type="password" class="form-control" placeholder=" contraseña" name="usuario_clave" required="">

                                    <button type="submit" name="registrar" class="btn btn-danger btn-block btn-round">Registrar</button>
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

<?php

                if(isset($_POST['registrar'])) {

              $nombre  = $_POST['nombre'];
              $cedula   = $_POST['cedula'];
              $telefono  = intval($_POST['telefono']);
              $direccion   = $_POST['direccion'];
              $usuario_nombre   = $_POST['usuario_nombre'];
              $usuario_clave   = $_POST['usuario_clave'];

          // Validamos la existencia del socio
          $sql = mysqli_query($conexion, "SELECT * from personal where n_cedula = '$cedula' ") or die ( "D");
          
           if (mysqli_num_rows($sql) > 0) {
              echo "  <script>
            alert('El usuario ya existe!');
            location.replace('admin.php');
            </script>";

          }else {

            $sql2=mysqli_query($conexion, "INSERT INTO personal (nombre, n_cedula, telefono, direccion, IDcargo) VALUES ('$nombre', '$cedula', '$telefono', '$direccion', 1)") or die ( "c");

            if ($sql2) {

              $IDpersona = mysqli_insert_id($conexion);


              $sql4 = mysqli_query($conexion, "INSERT INTO usuario (id_usuario, usuario_nombre, usuario_clave) VALUES ('$IDpersona', '$usuario_nombre', '$usuario_clave')") or die ( "B");

                  if ($sql4) {

                 $sql3 = mysqli_query($conexion,"INSERT INTO control_multa (estado, id_multa, id_rfecha, id_socio) VALUES ('p', 'M', '$Fecha', '$IDpersona')") or die ("$Fecha, $IDpersona");

                  if ($sql3) {
                  
                
                   echo " <script>
            alert('Datos Usuario Registrado Correctamente');
            location.replace('admin.php');
            
            </script>";

         
               }  
              }
              
            } else {

                echo "  <script>
            alert('Ha habido un problema, no se registraron los datos!');
            location.replace('admin.php');
            </script>";
            }


          }
           }
           ?>

<!-- Core JS Files -->
<script src="../assets/js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<!-- <script src="../assets/js/tether.min.js" type="text/javascript"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>


<!--  Paper Kit Initialization snd functons -->
<script src="../assets/js/paper-kit.js?v=2.1.0"></script>

</html>

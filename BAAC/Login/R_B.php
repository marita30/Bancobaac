<!doctype html>
<html lang="en">
<head>

    <?php 
     session_start();
    include('db.php');
    date_default_timezone_set('UTC'); 

   if(isset($_SESSION['usuario_nombre']) || isset($_SESSION['IDcargo']) || isset($_SESSION['fecha_g'])) {
        $nombre = $_SESSION['usuario_nombre'];
        $cargo = $_SESSION['IDcargo'];
        $Fecha = $_SESSION['fecha_g'];
    }

    $consulta = "SELECT MAX(id_rfecha) from reunion";
            $sql = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

             if (mysqli_num_rows($sql)) {
                $fila = mysqli_fetch_array($sql);
                $Ultima = $fila['MAX(id_rfecha)'];

                  if ($sql) {


                   $consulta2 = " SELECT n_ciclo, n_reunion FROM reunion WHERE id_rfecha = '$Ultima' ";
                   $sql2 = mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
                   if (mysqli_num_rows($sql2)) {
                     $fila1 = mysqli_fetch_array($sql2);
                     $n_ci= $fila1['n_ciclo'];
                    $n_re= $fila1['n_reunion'];
                    
                   }
                  
                }

              }
                    
                     //validar datos de la nueva reunion
              if ($n_re < 17)
                  {
                      
                       $ciclo_actual=$n_ci; //ciclo actual
                       $reunion_actual=$n_re;
                       $reunion_actual++;
                       $fecha = date("Y-m-d",strtotime("-1 day"));

                      $_SESSION['ciclo_g']=$ciclo_actual;
                      $_SESSION['reunion_g']=$reunion_actual;
                      $_SESSION['fecha_g']=$fecha;



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

	<title>AAC-Reunion Bancaria</title>

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
	            <a class="navbar-brand" href="#">Bienvenido <?PHP echo $nombre;?></a>
			</div>
			<div class="collapse navbar-collapse" id="navbarToggler">
	            <ul class="navbar-nav ml-auto">
	               <!--  <li class="nav-item">
	                    <a href="#" class="nav-link"><i class="fa fa-edit"></i>Registrar nuevo Socio</a>
	                </li> -->
	                <li class="nav-item">
	                    <a href="admin.php" class="nav-link"><i class="fa fa-home"></i>Inicio</a>
	                </li>
                   <!--  <li class="nav-item">
                        <a href="#" class="nav-link"><i class="fa fa-child"></i>  Prestamos</a>
                    </li>
                     <li class="nav-item">
                        <a href="#" class="nav-link"><i class=" fa fa-balance-scale"></i>  Abonos</a>
                    </li> -->
                   <!--   <li class="nav-item">
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
                </div>  
                    <div class="row" >
                        
                        <div class="col-lg-5 col-md-6 col-sm-8 col-xs-14 " style="background-image: url('../assets/img/gloves.jpg');">
                           
                                <div class="">
                                <h3 class="title" style="color: white;">Ultima Reunion!</h3>
                                <div class="social-line text-center">
                                    <a style="color: white;"><strong>Tu informacion</strong></a>
                                </div>
                                <form class="register-form" method="post">
                                    <label style="color: white;">Ciclo</label>
                                    <input type="text" class="form-control"  name="varciclo" value="<?php echo $n_ci; ?>" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="2">

                                   <label style="color: white;">Reunion</label>
                                    <input type="text" class="form-control"  name="varreunion" value="<?php echo $n_re; ?>" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="2">

                                    <label style="color: white;">Reunion</label>
                                    <input type="text" class="form-control"  name="fechaultima" value="<?php echo $Ultima; ?>">
                                    <br>
                                   
                                
                                <div class="forgot">
                                    <!-- <a href="#" class="btn btn-link btn-danger">Olvidaste tu contraseña?</a>
                                    <a href="../index.html" style="color: white;" >Regresar</a> -->
                                </div>
                            </div>
                       
                         </div>
                        <div class="col-lg-2 col-md-3 col-sm-5 col-xs-11" style="background-color: ;">
                            
                        <img src="../assets/img/arrow2.png" style="width:100%;">
                         <button type="submit" name="Guardar" class="btn btn-danger btn-block btn-round">Ingresar</button>

                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-8 col-xs-14" style="background-image: url('../assets/img/meeting (2).jpg'); ">
                        
                                  <div class="">
                                <h3 class="title" style="color: white;">Nueva Reunion!</h3>
                                <div class="social-line text-center">
                                    <a style="color: white;"><strong>Tu informacion</strong></a>
                                </div>
                               
                                    <label style="color: white;">Ciclo</label>
                                    <input type="text" class="form-control"  name="varciclo" value="<?php echo $ciclo_actual; ?>" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="2">

                                   <label style="color: white;">Reunion</label>
                                    <input type="text" class="form-control"  name="varreunion" value="<?php echo $reunion_actual; ?>" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="2">

                                    <label style="color: white;">Reunion</label>
                                    <input type="text" class="form-control"  name="fechaultima" value="<?php echo $fecha; ?>">
                                    <br>
                                   
                                </form>
                                <div class="forgot">
                                    <!-- <a href="#" class="btn btn-link btn-danger">Olvidaste tu contraseña?</a>
                                    <a href="../index.html" style="color: white;" >Regresar</a> -->
                                </div>
                            </div>
                          
                         </div>
                     </div>

                    
     
                <!-- Tab panes -->
            </div>
        </div>
    </div>
	<footer style="background-color: black;" class="footer section-dark">
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


            if(isset($_POST['Guardar'])) {

             $insert = mysqli_query($conexion,"INSERT INTO reunion (n_reunion, id_rfecha, n_ciclo) values ('$reunion_actual', '$fecha', '$ciclo_actual')") or die("error");

             if ($insert) {
               echo " <script>
            alert('Se registraron los valores!');
            location.replace('T_C.php');
            </script>";


             } else{
               echo " <script>
            alert('No se registraron los valores!');
            location.replace('R_B.php');
            </script>";


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

<!doctype html>
<html lang="en">
<head>

    <?php 
     session_start();
    include('db.php');

   if(isset($_SESSION['usuario_nombre']) || isset($_SESSION['IDcargo']) || isset($_SESSION['fecha_g']) || isset($_SESSION['id'])) {
        $nombre = $_SESSION['usuario_nombre'];
        $cargo = $_SESSION['IDcargo'];
       // $Fecha = $_SESSION['fecha_g'];
         $id = intval($_SESSION['id']);
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

              } //FIN DEL WHILE


           
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

	<title>BAAC- Balance General</title>

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
	                    <a href="admin_area.php " class="nav-link"><i class="fa fa-handshake-o"></i>Inicio</a>
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
        <div class="page-header page-header-xs" data-parallax="true" style="background-image: url('../assets/img/efectivas.jpg');">
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
                         <h2 style="color: #800000"> Estados de Cuenta de Socios</h2>

                        <br />
                        
                    </div>
             <!--   
               //Aqui trabajar -->

 <div class="container">
  <h3 style="color:#800000">Buscar Socio </h3>
   <p style="color: #800000">Aqui encontraras informacion de estados financieros de cada socio (Cuentas de Ahorro, prestamos,abonos y multas) <br> <br> </p>
  <h3 style="color:#800000">PROXIMAMENTE... </h3>

 
  <p style="color: #800000">Estamos trabajando en ello. Gracias por utilizar nuestros servicios </p>
 


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

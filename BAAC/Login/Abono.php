<!doctype html>
<html lang="en">
<head>

    <!-- ALERTIFY INICIO-->

     <script src = "https://ajax.googleapis.coma/jax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="alertify.js" type="text/javascript"></script>
   <link rel="stylesheet" href="alertify/themes/default.css">
   <link rel="stylesheet" href="alertify/alertify.css">

<link rel="stylesheet" href="alertify/alertify.rtl.css">
<link rel="stylesheet" href="alertify/themes/default.rtl.css">
<link rel="stylesheet" href="alertify/themes/bootstrap.css">
    <!-- ALERTIFY FIN-->

    <?php 
     session_start();
    include('db.php');
    date_default_timezone_set('UTC');
   
       if(isset($_SESSION['ciclo_g']) || isset($_SESSION['reunion_g']) || isset($_SESSION['fecha_g'])) {
                    $Ciclo = $_SESSION['ciclo_g'];
                    $Reunion = $_SESSION['reunion_g'];
                    $Fecha = $_SESSION['fecha_g'];
                    $fechamulta="sin multas";
          $desmulta="";

                }

?> 

  <!-- BOOSTRAP FIN -->
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

	<title>AAC-Transaciones Financieras</title>

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
	                    <a href="admin.php" class="nav-link"><i class="fa fa-home"></i>Cerrar Reunion</a>
	                </li>
                    <li class="nav-item">
                        <a href="T_C.php" class="nav-link"><i class="fa fa-american-sign-language-interpreting"></i>  Reunion Bancaria</a>
                    </li>
                     <li class="nav-item">
                        <a href="Prestamo.php" class="nav-link"><i class=" fa fa-child"></i>  Prestamo</a>
                    </li>
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
                    </div><form action="<?=$_SERVER['PHP_SELF']?>" method="post">

                      <div >
                        <div>
                          <div >
                          <center>
                            <h4><strong>SELECIONA A UN SOCIO</strong></h4><br>
                                      
                                    <select class="btn btn-outline-info " id="eleccion" onchange="this.form.submit()"  name="eleccion"  ">
                                      <option value=""></option>
                                             <?php   
                                              $consulta = mysqli_query($conexion,"SELECT id_socio, nombre from personal where IDcargo =1 ");
                                    
                                               while ($fila = mysqli_fetch_array($consulta))   
                                              {
                                             ?>
                                  
                                 
                                    <option value="<?php echo $fila['id_socio'] ?>"><?php echo $fila['id_socio'];?> -> <?php echo $fila['nombre']; ?> 

                                    </option>
                              
                                      <?php }  ?>
                                 </select>
                          </center>
                        </div>
                        <div >
                           <center>
                            <div>
                              <br>  <form>

                              <label  for="Ciclo">Ciclo:</label>
                              <input size="1%" readonly="" type="text" name="ciclo" value="<?php echo $Ciclo; ?>"/>
                              <label for="Reunion">Reunion:</label>
                              <input size="1%" readonly=""  type="text" name="reunion" value="<?php echo $Reunion; ?>"/>
                              <label for="Fecha">Fecha:</label>
                              <input readonly="" size="7%" type="text" name="fecha" value="<?php echo $Fecha; ?>"/>

                                 </form>
                            </div>
                          </center>
                        </div>

</div>
        </div>
      </form>
    </div>

      <?
 if(isset($_POST['eleccion'])) {
  $_SESSION['IDS'] = $_POST['eleccion'];
      $IDS = $_SESSION['IDS'];
       $sql = mysqli_query($conexion,"SELECT nombre from personal where id_socio = '$IDS' ") or die('Error');
        while ($fila = mysqli_fetch_array($sql))
          { 
            // PRIMERA VARIABLE
            $nombre = $fila['nombre'];
          } 

 
       $sql2 = mysqli_query($conexion,"SELECT MAX(id_rfecha),id_prestamo,monto FROM prestamo WHERE id_socio='$IDS' AND estado='nc'");


           while ($fila = mysqli_fetch_array($sql2))
          { 
            // MAS VARIABLES
            $monto = $fila['monto'];
            $id_prestamo = $fila['id_prestamo'];           
            
          }
          $_SESSION['id_prestamo'] = $id_prestamo;

          $sql1 = mysqli_query($conexion,"SELECT MAX(fecha_abono), bal_inicial,n_abono,importe FROM abono WHERE id_prestamo='$id_prestamo' AND estado='nc' ") or die('Error');

    

        while ($fila = mysqli_fetch_array($sql1))
          { 
            // MAS VARIABLES
            $fecha_abono = $fila['fecha_abono'];
            $bal_final = $fila['bal_inicial'];
            $n_abono = $fila['n_abono'];
            $importe = $fila['importe'];

          }

          $_SESSION['n_abono'] = $n_abono;
     
         }
?>
                                 <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <center>
    <h2>ABONO</h2><br>
                             <div style="background-image: url('../assets/img/abono.jpg'); background-repeat: no-repeat; background-attachment: fixed "> 
                                 <div class="row">
                                   <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12"><br>
                                      <h5 style="color: black;"><strong> No. de Socio</strong></h5>
                                      <input name="socio" readonly="" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" type="text" class="form-control" style="width: 60%; color: black;" placeholder="ID"  value="<?php echo $IDS; ?>">                                     
                                   </div> 
                                   <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                                        <h5 style="color: black;"><strong> Nombre del socio</strong></h5>
                                      <input name="NS" readonly="" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" type="text" class="form-control" style="width: 60%;color: black;" placeholder="Nombre" value="<?php echo $nombre; ?>">
                                   </div>
                                   <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12"><br>
                                       <h5 style="color: black;"><strong> Cantidad del prestamo</strong></h5>
                                      <input readonly="" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" type="text" class="form-control" style="width: 60%;color: black;" placeholder="Cantidad" value="<?php echo $monto; ?>">
                                   </div>
                                  </div><br>

                              
                                    <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                                       <h5 style="color: black;"><strong>Realice su abono # <?php echo $n_abono ?></strong></h5>
                                      <input readonly="" name="monto" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" type="text" class="form-control" style="width: 60%;color: black;" value= "<?php echo $importe ?>" ><br>                                     
                                   </div> 
                                  
                                                             
                            </div>
                          
                                  <br> <button name="guardarprestamo" type="submit" class="btn btn-outline-success btn-round" >Guardar Abono</button>
                          </form>        



                                  <div class="col-lg-8 col-md-9 col-sm-10 col-xs-15">
                                     <table class="table table-hover"><br>
                            <thead>
                              <tr>
                                <th scope="col">No. Abono</th>
                                <th scope="col">Monto</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Valor restante</th>
                                
                               
                              </tr>
                            </thead>
                            <tbody>
                              <?
  $sql1 = mysqli_query($conexion,"SELECT fecha_abono, bal_inicial,n_abono,importe FROM abono WHERE id_prestamo='$id_prestamo' and estado = 'NC' order by n_abono ASC ") or die('Error');

    

        while ($fila = mysqli_fetch_array($sql1))
          { 
            // MAS VARIABLES
            $fecha_abono = $fila['fecha_abono'];
            $bal_inicial = $fila['bal_inicial'];
            $n_abono = $fila['n_abono'];
            $importe = $fila['importe'];

          

                              ?>
                              <tr>
                                <th scope="row"><?php echo $n_abono; ?></th>
                                <td ><?php echo $monto; ?></td> 
                                <td ><?php echo $fecha_abono; ?></td>
                                <td ><?php echo $bal_inicial; ?></td>                                
                                 <?} ?>
                              </tr>
                            </tbody>
                          </table>
                                  </div>  </center>

      <?
                      if(isset($_POST['guardarprestamo'])) {
                        $idS = $_SESSION['IDS'];
                        $n_abono = $_SESSION['n_abono'];
                        $idP = $_SESSION['id_prestamo'];
                         $Fecha = $_SESSION['fecha_g'];


                        $sql = mysqli_query($conexion, "UPDATE abono set estado = '$Fecha' where id_prestamo = $idP and n_abono = $n_abono");

                        if ($sql) {
                          
                              echo "  <script>   alertify.alert('EXITO', 'ABONO PROCESADO'); </script>";
                        
                   }else{

                     echo "  <script>   alertify.alert('ERROR', 'ABONO NO PROCESADO'); </script>";

                   }}
                      ?>

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

<!-- Core JS Files -->
<script src="../assets/js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<!-- <script src="../assets/js/tether.min.js" type="text/javascript"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>


<!--  Paper Kit Initialization snd functons -->
<script src="../assets/js/paper-kit.js?v=2.1.0"></script>

</html>

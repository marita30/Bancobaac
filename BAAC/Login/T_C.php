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
   
       if(isset($_SESSION['ciclo_g']) || isset($_SESSION['reunion_g']) || isset($_SESSION['fecha_g'])) {
                    $Ciclo = $_SESSION['ciclo_g'];
                    $Reunion = $_SESSION['reunion_g'];
                    $Fecha = $_SESSION['fecha_g'];
                    $fechamulta="sin multas";
          $desmulta="";

                }


                  if(isset($_POST['eleccion'])) {

      $_SESSION['IDS'] = $_POST['eleccion'];
      $IDS = $_SESSION['IDS'];
    
     //$sql3 = mysql_query("SELECT total_voluntario,total_obligatorio FROM cuenta_ahorro WHERE id_socio = '$IDS' and id_rfecha = (SELECT MAX(id_rfecha) from cuenta_ahorro where id_socio = '$IDS') ") or die('Error');
     $sql3 = mysqli_query($conexion,"SELECT cuenta_ahorro.total_voluntario,cuenta_ahorro.total_obligatorio, personal.id_socio, personal.nombre FROM cuenta_ahorro JOIN personal ON cuenta_ahorro.id_socio=personal.id_socio WHERE cuenta_ahorro.id_socio = '$IDS' and id_rfecha = (SELECT MAX(id_rfecha) from cuenta_ahorro where cuenta_ahorro.id_socio = '$IDS') ") or die('Error');

      while ($fila = mysqli_fetch_array($sql3))
          { 

            $TV = $fila['total_voluntario'];
            $TO = $fila['total_obligatorio'];
            $idcsocio = $fila['id_socio'];
            $nomsocio = $fila['nombre'];

      
          }
  $_SESSION['id_socio'] = $idcsocio;
  $_SESSION['TO'] = $TO;
  $_SESSION['TV'] = $TV;
  $_SESSION['nombre'] = $nomsocio;
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
                        <a href="prestamo.php" class="nav-link"><i class="fa fa-child"></i>  Prestamos</a>
                    </li>
                     <li class="nav-item">
                        <a href="Abono.php" class="nav-link"><i class=" fa fa-balance-scale"></i>  Abonos</a>
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
                            
                                 <h2>ESTADO DE CUENTA</h2><br>
                              
                                 <div class="row">
                                   <div class="col-lg-3 col-md-4 col-sm-5 col-xs-11">
                                      <h5>No. de Socio</h5>
                                      <input name="socio" readonly="" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" type="text" class="form-control" style="width: 60%;" placeholder="ID"  value="<?php echo $idcsocio; ?>">                                     
                                   </div> 
                                   <div class="col-lg-3 col-md-4 col-sm-5 col-xs-11">
                                       <h5>Nombre del Socio</h5>
                                      <input name="NS" readonly="" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" type="text" class="form-control" style="width: 60%;" placeholder="Nombre" value="<?php echo $nomsocio; ?>">
                                   </div>

                                    <div class="col-lg-3 col-md-4 col-sm-5 col-xs-11">
                                      <h5>Total de ahorro OBLIGATORIO</h5>
                                      <input readonly=""  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" type="text" class="form-control" style="width: 60%;" placeholder="Cantidad" value="<?php echo $TO; ?>">                                     
                                   </div>
                                   <div class="col-lg-3 col-md-4 col-sm-5 col-xs-11">
                                       <h5>Total ahorro VOLUNTARIO</h5>
                                      <input readonly="" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" type="text" class="form-control" style="width: 60%;" placeholder="Cantidad" value="<?php echo $TV; ?>">
                                   </div>
                                  </div><br>
                                   <label><strong>Aplicale una Multa</strong></label>
                                  <div>
                                     <select id="multas"  class="btn btn-outline-success btn-round " name="multas"  ">
                                      <option value="0"></option>
                                           <option value="T" >Llegada tarde</option>
                                           <option value="X">Ausente</option>
                                        </select>
                                       
                                       <button name="guardamulta" type="submit" class="btn btn-outline-danger btn-round" >Aplicar Multa</button>
                                     
                                  </div>
                               </center>
                        </div>

</div>

         <?php

           
            //FIN DEL WHILE ?> 
        </div>
      </form>
                    
                </div>  
                                                  <!-- INICIO COLUMNAS -->
                    <br><div class="row" style="margin-left: -11%;" >
                                                     <!-- PRIMERA -->
                        <div class="col-lg-4 col-md-5 col-sm-7 col-xs-13" style="background-image: url('../assets/img/money.jpg');">
                         <form method="post">
                               <center>
                                 <h2>INGRESOS</h2>
                                 <div class="row">
                                   <div class="col-lg-6 col-md-7 col-sm-9 col-xs-15 form-group has-success">
                                      <h5>Cuota Obligatoria</h5>
                                      <input  name="cuotaobligatoria" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" type="text" class="form-control form-control-success" style="width: 60%;" placeholder="Cantidad">                                     
                                   </div>
                                   <div class="col-lg-6 col-md-7 col-sm-9 col-xs-15 form-group has-success">
                                       <h5>Cuota Voluntaria</h5>
                                      <input name="cuotavoluntaria" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" type="text" class="form-control form-control-success" style="width: 60%;" placeholder="Cantidad">
                                   </div>

                                 </div><br>
                                  <!-- <div>
                                  
                                   </div> --><br>
                               </center>


                       
                         </div>
                                                   <!-- SEGUNDA -->
                        <div class="col-lg-5 col-md-6 col-sm-7 col-xs-12">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">Multa</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col"></th>
                               
                              </tr>
                            </thead>
                            <tbody>
                              <?
   $sql4 =  mysqli_query($conexion,"SELECT reunion.id_rfecha,multa.descripcion FROM control_multa JOIN reunion ON control_multa.id_rfecha=reunion.id_rfecha JOIN multa ON control_multa.id_multa=multa.id_multa WHERE control_multa.id_socio='$IDS' and estado='sp'") or die('Error');
  $fechamulta="Sin multas";
  $desmulta="";

                              while ($fila1=mysqli_fetch_array($sql4)) {
                              $fechamulta=$fila1['id_rfecha'];
                              $desmulta=$fila1['descripcion'];

                              ?>
                              <tr>
                                <th scope="row"><?php echo $fechamulta; ?></th>
                                <td ><?php echo $desmulta; ?></td> 
                               <td><a name="prueba" href="T_C.php?id_eliminar=<?php echo $fila1['id_rfecha']; ?>" class="btn btn-danger">PAGAR</a></td>
                                 <?} ?>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                                                <!-- TERCERA -->
                        <div class="col-lg-4 col-md-5 col-sm-7 col-xs-13" style="background-image: url('../assets/img/money_in.jpg'); margin-right: -30%; ">
                        
                          <center>
                                 <h2 style="color: white;">RETIROS</h2>
                                 <div class="row">
                                  
                                   <div class="col-lg-11 col-md-12 col-sm-14 col-xs-20 form-group has-success">
                                       <h5 style="color: white;">Retiro Voluntario</h5>
                                      <input name="Rvoluntario" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" type="text" class="form-control form-control-success" style="width: 30%;" placeholder="Cantidad">
                                   </div>

                                 </div><br>
                               <br>
                               </center>
                            
                        </div>

                                                      <!-- FIN COLUMNAS -->
     
                <!-- Tab panes -->
            </div>
            <br><center>
                           <div>
                          
                                     <button name="guardarprestamo" type="submit" class="btn btn-outline-success btn-round" >Guardar Datos</button>

                              </form>
                                   </div></center>

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

if(isset($_GET['id_eliminar'])) { 

      $id = ($_GET['id_eliminar']);
      $S = $_SESSION['id_socio'];
      $NS = $_SESSION['nombre'];

    $eliminar = mysqli_query($conexion,"DELETE FROM  control_multa where id_rfecha = '$id' and id_socio = '$S'") or die(mysql_error());

        if ($eliminar) {
          
        
           echo "  <script>   alertify.alert('Confirmacion', 'Se ha Eliminado la multa del $id del socio $NS'); </script>"; 

        }}

if (isset($_POST['guardamulta'])) {
  $tipo_multa = ($_POST['multas']);
  $IDS = ($_POST['socio']);
  $NS = ($_POST['NS']);


  if ($tipo_multa == "0") {

    echo "  <script>   alertify.alert('ERROR', 'NO HAS ELEGIDO MULTA A APLICAR'); </script>"; 
    
  } elseif ($IDS == "") {
     echo "  <script>   alertify.alert('ERROR', 'ELIGE EL SOCIO A MULTAR'); </script>"; 
  } else {

  $multa = mysqli_query($conexion ," INSERT INTO control_multa (estado, id_multa, id_rfecha, id_socio) VALUES ('sp', '$tipo_multa', '$Fecha', '$IDS')");
     if ($multa) {
     echo "  <script>   alertify.alert('EXITO', 'MULTA APLICADA AL SOCIO = $NS'); </script>"; 
     } else {

         echo  "<script>
          alert('ERROR AL APLICAR MULTA ' );
          location.replace('T_C.php');
        </script>
      ";

     }
      
  } 
}

                                          // QUE PASA CON EL RETIRO?

  if(isset($_POST['guardarprestamo'])) {
    $id_socio = 0;
     $idcsocio = $_SESSION['id_socio'];
    if ($idcsocio == 0) {
    echo "  <script>   alertify.alert('ERROR', 'ELIGE PRIMERO A UN SOCIO'); </script>"; 
    } else {
              $Fecha = $_SESSION['fecha_g'];         
             $c_obligatorio = ($_POST['cuotaobligatoria']);
             $c_voluntaria = ($_POST['cuotavoluntaria']);
              $r_voluntario = ($_POST['Rvoluntario']);
              // $t_voluntario = ($_POST['totalv']);
              // $t_obligatorio = ($_POST['totalo']);
              $t_voluntario = $_SESSION['TV'];
              $t_obligatorio = $_SESSION['TO'];
             
              $NS = $_SESSION['nombre'];

              $t_obligatorio1 = 0;
              $t_voluntario1 = 0;

                 if ($r_voluntario > $t_voluntario) {
                echo "  <script>   alertify.alert('ERROR', 'NO PUEDES RETIRAR MAS DE LO QUE POSEES'); </script>"; 
              } else{

              //calcular el nuevo total de ahorros a partir de cuotas de ahorro
              $t_voluntario1= $t_voluntario + $c_voluntaria - $r_voluntario;
              $t_obligatorio1= $t_obligatorio + $c_obligatorio;



            $sql=mysqli_query($conexion,"INSERT INTO cuenta_ahorro(
    c_obligatoria,
    c_voluntaria,
    r_voluntario,
    r_obligatorio,
    total_voluntario,
    total_obligatorio,
    id_rfecha,
    id_socio
 )
    
    VALUES (
        '$c_obligatorio',
        '$c_voluntaria',
        '$r_voluntario',
        '0',
        '$t_voluntario1',
        '$t_obligatorio1',
        '$Fecha',
        '$idcsocio'
)");

            if($sql){

            $sql2 = mysqli_query($conexion,"SELECT personal.nombre,c_voluntaria,c_obligatoria,r_voluntario,r_obligatorio,total_obligatorio,total_voluntario FROM cuenta_ahorro JOIN personal on cuenta_ahorro.id_socio=personal.id_socio WHERE id_rfecha= '$Fecha' GROUP BY personal.nombre, c_voluntaria,c_obligatoria,r_voluntario,r_obligatorio");

            if ($sql2) {
              session_id($idcsocio);
              session_destroy();
              echo  "<script>
          alert('Se registro la transaccion' );
        </script>
      ";
           }   }else {

                     echo "<script>
          alert('Error');
          location.replace('T_C.php');
        </script>
      ";

            }

            }}}
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

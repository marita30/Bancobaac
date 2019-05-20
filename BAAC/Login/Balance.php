<!doctype html>
<html lang="en">
<head>

    <?php 
     session_start();
    include('db.php');

   if(isset($_SESSION['usuario_nombre']) || isset($_SESSION['IDcargo']) || isset($_SESSION['fecha_g']) || isset($_SESSION['id'])) {
        $nombre = $_SESSION['usuario_nombre'];
        $cargo = $_SESSION['IDcargo'];
        //$Fecha = $_SESSION['fecha_g'];
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
        <div class="page-header page-header-xs" data-parallax="true" style="background-image: url('../assets/img/balance.jpg');">
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
                         <h2 style="color: #800000"> Balance General</h2>
                         <h3 style="color:#B44E4E">Datos Actualizados el <?PHP echo $Ultima;?> </h3>
                         <h3 style="color: #B44E4E">   Ciclo Actual= <?PHP echo $n_ci;?> </h3>
                         <h3 style="color: #B44E4E"> Ultima Reunion =<?PHP echo $n_re;?> </h3> 

                        <br />
                        
                    </div>
             <!--   
               //Aqui trabajar -->

 <div class="container">
  <h3 style="color:#800000">Informacion General </h3>
  <p style="color: #800000 ">Informacion del dinero vigente en Banco Comunitario "Atrevete a Creer" <br>
  Datos divididos en: </p>
  <p style="text-indent: 10em; color: #800000" >-Total de dinero en caja (proviniente de: Cuentas de AHorros, Abonos y multas pagadas)</p>
  <p style="text-indent: 10em; color: #800000" >-Total de dinero que socios deben al banco:</p>
  
  <p style="text-indent: 30em; color: #800000" >- Total de dinero de socios activos con prestamos vigentes </p>
    <p style="text-indent: 30em; color: #800000" >- Total de dinero de socios acivos con multas sin pagar <br><br></p>

  <form method="post">
  <table class="table">
    <thead>
      <tr>
        <th>Total en Caja</th>
        <th>Total Dinero en prestamos</th>
        <th>Total Dinero en Multas sin Pagar</th>
        <th>Total Dinero</th>
      </tr>
    </thead>
    <tbody>

<?php
    //Consulta para mostrar todas las multas sin pagar
  $consulta4 = "SELECT personal.nombre, prestamo.id_prestamo,prestamo.monto, prestamo.id_rfecha FROM prestamo JOIN personal on prestamo.id_socio=personal.id_socio WHERE prestamo.estado='NC'";
            $sql4 = mysqli_query( $conexion, $consulta4) or die ( "Algo ha ido mal en la consulta a la base de datos");
           //echo mysql_num_rows($sql3);
              $balprestamos=0;
            while ($fila4 = mysqli_fetch_array($sql4))
          { 
            ?>
       
             <?php $nompes= $fila4['nombre']; ?>
              <?php  $idpres= $fila4['id_prestamo']?>

               <?php
    //Consulta para mostrar el saldo pendiente de un prestamo
  $consulta5 = "SELECT MAX(fecha_abono), bal_inicial FROM abono WHERE id_prestamo= $idpres AND estado='nc'";
            $sql5 = mysqli_query( $conexion, $consulta5) or die ( "Algo ha ido mal en la consulta a la base de datos");
           //echo mysql_num_rows($sql3);
            
            while ($fila5 = mysqli_fetch_array($sql5))
          { 
            ?>
       
              <!--<td><?php //echo $fila['bal_inicial']; ?></td>--> 
               <!--<td><?php //echo $fila5['bal_inicial']; ?></td>--> 
               <?php $pendiente1=$fila5['MAX(fecha_abono)']; 
                      $pendiente=$fila5['bal_inicial'];
                      $balprestamos=$balprestamos+$fila5['bal_inicial'];//calcular cuanto dinero tiene el banco en prestamo el ultimo dato en sair del ciclo es el unico valor
               ?>      
            <?php
          }
    ?>
            <?php
          }
    ?>  

    <?php
    //Consulta para mostrar todas las multas sin pagar y calcular la suma de todas esas cuotas
       $balmultas=0;
  $consulta3 = "SELECT personal.nombre, reunion.id_rfecha,multa.descripcion,multa.tarifa FROM control_multa JOIN personal on control_multa.id_socio=personal.id_socio JOIN reunion ON control_multa.id_rfecha=reunion.id_rfecha JOIN multa ON control_multa.id_multa=multa.id_multa WHERE control_multa.estado='sp'";
            $sql3 = mysqli_query( $conexion, $consulta3) or die ( "Algo ha ido mal en la consulta a la base de datos");
           //echo mysql_num_rows($sql3);

            while ($fila3 = mysqli_fetch_array($sql3))
          { 
            ?>
                <?php $balmultas=$balmultas+$fila3['tarifa']; ?>
            </tr>
            <?php
          }
    ?>    
      <tr class="table-success">
              <td>Total en caja chica</td>
              <td>C$ <?php echo $balprestamos; ?></td>
              <td>C$ <?php echo $balmultas; ?></td> 
              <?php $sumabalance=$balmultas+$balprestamos; // TOtal de capital en banco?>
              <td>C$ <?php echo $sumabalance; ?></td> 
            </tr>

    </tbody>
  </table>
  </form>
</div>


  <div class="container">
  <h3 style="color:#800000"> * Prestamos Vigentes</h3>
  <p style="color: #800000"> informacion sobre los prestamos que estan sin cancelar  </p>
  <form method="post">
  <table class="table">
    <thead>
      <tr>
          <th>Socio</th>
        <th>No de prestamo</th>
        <th>Monto Prestado</th>
        <th>Saldo pendiente</th>
        <th>Fecha de Prestamo</th>
      </tr>
    </thead>
    <tbody>
      
        <?php
    //Consulta para mostrar todas las multas sin pagar
  $consulta4 = "SELECT personal.nombre, prestamo.id_prestamo,prestamo.monto, prestamo.id_rfecha FROM prestamo JOIN personal on prestamo.id_socio=personal.id_socio WHERE prestamo.estado='NC'";
            $sql4 = mysqli_query( $conexion, $consulta4) or die ( "Algo ha ido mal en la consulta a la base de datos");
           //echo mysql_num_rows($sql3);
              $balprestamos=0;
            while ($fila4 = mysqli_fetch_array($sql4))
          { 
            ?>
            <tr class="table-warning">
       
             <td><?php echo $fila4['nombre']; ?></td>
              <td><?php echo $fila4['id_prestamo'];  $idpres= $fila4['id_prestamo']?></td>

               <?php
    //Consulta para mostrar el saldo pendiente de un prestamo
  $consulta5 = "SELECT MAX(fecha_abono), bal_inicial FROM abono WHERE id_prestamo= $idpres AND estado='nc'";
            $sql5 = mysqli_query( $conexion, $consulta5) or die ( "Algo ha ido mal en la consulta a la base de datos");
           //echo mysql_num_rows($sql3);
            
            while ($fila5 = mysqli_fetch_array($sql5))
          { 
            ?>
       
              <!--<td><?php //echo $fila['bal_inicial']; ?></td>--> 
               <!--<td><?php //echo $fila5['bal_inicial']; ?></td>--> 
               <?php $pendiente1=$fila5['MAX(fecha_abono)']; 
                      $pendiente=$fila5['bal_inicial'];
                      
               ?>

            
            <?php
          }
    ?>
              <td> C$<?php echo $fila4['monto']; ?></td> 
              <td>C$<?php echo $pendiente; ?></td> 
               <td><?php echo $fila4['id_rfecha']; ?></td> 
        
       

            </tr>
            <?php
          }
    ?>
      

       <?   while ($fila = mysqli_fetch_array($sql))
          {     

           ?>
      <tr class="table-success">
               

      
       

            </tr>   <? } ?>

    </tbody>
  </table>
  </form>
</div>


<div class="container">
  <h3 style="color:#800000">Multas</h3>
  <p style="color: #800000"> Informacion sobre las multas que aun estan sin cancelar <br> Cuotas por multa: </p>
  <p style="text-indent: 10em; color: #800000" >-Tarde (Llegadas Tarde) = C$5</p>
  <p style="text-indent: 10em; color: #800000" >-Ausente = C$10</p>
  <form method="post">
  <table class="table">
    <thead>
      <tr>
        <th>Socio</th>
        <th>Tipo de Multa</th>
        <th>Fecha del Registro de multa</th>
      </tr>
    </thead>

    <tbody>

       <?php
    //Consulta para mostrar todas las multas sin pagar
       $balmultas=0;
  $consulta3 = "SELECT personal.nombre, reunion.id_rfecha,multa.descripcion,multa.tarifa FROM control_multa JOIN personal on control_multa.id_socio=personal.id_socio JOIN reunion ON control_multa.id_rfecha=reunion.id_rfecha JOIN multa ON control_multa.id_multa=multa.id_multa WHERE control_multa.estado='sp'";
            $sql3 = mysqli_query( $conexion, $consulta3) or die ( "Algo ha ido mal en la consulta a la base de datos");
           //echo mysql_num_rows($sql3);

            while ($fila3 = mysqli_fetch_array($sql3))
          { 
            ?>
            <tr class="table-warning">
       
              <td><?php echo $fila3['nombre']; ?></td>
              <td><?php echo $fila3['descripcion'] ?></td> 
               <td><?php echo $fila3['id_rfecha']; ?></td>
            </tr>
            <?php
          }
    ?>
      

    </tbody>
  </table>
  </form>
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

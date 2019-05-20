 <?php
    session_start();
    include('db.php');

    if(isset($_POST['login'])) { // comprobamos que se hayan enviado los datos del formulario
        // comprobamos que los campos usuarios_nombre y usuario_clave no estén vacíos
        
            // "limpiamos" los campos del formulario de posibles códigos maliciosos
            $usuario_nombre = ($_POST['usuario_nombre']);
            $usuario_clave = ($_POST['usuario_clave']);
            // comprobamos que los datos ingresados en el formulario coincidan con los de la BD
           

            $consulta = "SELECT personal.IDcargo, personal.id_socio, usuario.usuario_nombre from personal INNER JOIN usuario on personal.id_socio = usuario.id_usuario where usuario.usuario_nombre= '$usuario_nombre' AND usuario.usuario_clave = '$usuario_clave' ";
            $sql = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

            if($row = mysqli_fetch_array($sql)) {
                $_SESSION['IDcargo'] = $row['IDcargo'];
                $_SESSION['id'] = $row['id_socio']; // creamos la sesion "usuario_id" y le asignamos como valor el campo usuario_id
                $_SESSION['usuario_nombre'] = $row["usuario_nombre"]; // creamos la sesion "usuario_nombre" y le asignamos como valor el campo usuario_nombre
                // header("Location: index2.php");

                            if(isset($_SESSION['usuario_nombre']) || isset($_SESSION['IDcargo'])) {
                    $nombre = $_SESSION['usuario_nombre'];
                    $cargo = $_SESSION['IDcargo'];
                
                    ?>


                    <?php

    
                    /*Condicion para validar al usuario administrador*/
                    if ($cargo==3) { 

                        echo "      <script >
                                alert('Hola $nombre - administrador de reuniones');
                                location.replace('admin.php');
                            </script>";

                            ?>

                        <?php

                        /*Else para los demas usuarios*/
                    } if ($cargo==1) {
                        echo "      <script>
                                alert('Hola Socio $nombre');
                                location.replace('socio.php');  

                            </script>";

                    }if ($cargo==2) { 

                        echo "      <script>
                                alert('Hola $nombre - Administrador de area!');
                                location.replace('admin_area.php');
                            </script>";
                        ?>


                        <?php
                    }}

                  
            }else {
?>
                <script>
                                alert('Datos ingresados Incorrectos');
                                location.replace('login.php');
                            </script>
<?php
            }}
?> 
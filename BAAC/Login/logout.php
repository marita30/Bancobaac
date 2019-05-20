<?php
    session_start();
    include('db.php'); // incluímos los datos de acceso a la BD
    // comprobamos que se haya iniciado la sesión
    if(isset($_SESSION['usuario_nombre'])) {
        session_destroy();
        header("Location: ../index.html");
    }else {
        echo "Operación incorrecta.";
    }
?> 
<?php
require "../controllers/administrador.php";
require "../controllers/habitacion.php";
require "../controllers/promocion.php";
require "../controllers/reserva.php";
require "../controllers/servicio.php";
require "../controllers/usuario.php";
require "../routes/log.php";

$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestMethod == "GET") {
    $solicitud = $_GET["url"];
if ($solicitud == "administrador") {
    obtenerAdministrador();
} else if ($solicitud == "habitacion") {
    obtenerHabitacion();
} else if ($solicitud == "promocion") {
    obtenerPromocion();
} else if ($solicitud == "reserva") {
    obtenerReserva();
} else if ($solicitud == "servicio") {
    obtenerServicio();
} else if ($solicitud == "usuario") {
    obtenerUsuario();
}else {
    echo json_encode(["error" => "Ruta no encontrada"]);    
}
}

elseif ($requestMethod == "POST") {
    $solicitud = $_GET["url"] ?? null;

    if ($solicitud == "loginAddAdm") {
        $ci = $_POST["ci"];
        $nombre_completo = $_POST["nombre_completo"];
        $email = $_POST["email"];
        $area = $_POST["area"];
        $password = $_POST["password"];
       // echo "Datos recibidos: CI: $ci, Nombre Completo: $nombre_completo, Email: $email, Area: $area";
        loginAddAdmin($ci, $nombre_completo, $email, $area, $password);
    }elseif ($solicitud == "login") {
          $email = $_POST["email"];
        $password = $_POST["password"];
      //  echo "Datos recibidos: Email: $email, Contraseña: $password";
        loginAdministrador($email, $password);
    } elseif ($solicitud == "loginUsr") {
          $email = $_POST["email"];
        $password = $_POST["password"];
      //  echo "Datos recibidos: Email: $email, Contraseña: $password";
        loginUsuario($email, $password);
    } elseif ($solicitud == "loginAddUsr") {
          $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $celular = $_POST["celular"];
        $password = $_POST["password"];
      //  echo "Datos recibidos: Email: $email, Contraseña: $password";
        loginAddUser($nombre, $apellido, $email, $celular, $password);
    } elseif ($solicitud == "habitacion") {
        $tipo_hab = $_POST["tipo_hab"];
        $descripcion_hab = $_POST["descripcion_hab"];
        $cantidad = $_POST["cantidad"];
        $imagen = $_POST["imagen"];
        $precio = $_POST["precio"];
        echo "Datos recibidos: Tipo de Habitación: $tipo_hab, Descripción: $descripcion_hab, Cantidad: $cantidad, Imagen: $imagen, Precio: $precio";
        agregarHabitacion($tipo_hab,$descripcion_hab,$cantidad);
        global $habitacionModel;
    } elseif ($solicitud == "promocion") {
        $tipo_promo = $_POST["tipo_promo"];
        $descripcion_promo = $_POST["descripcion_promo"];
        $precio = $_POST["precio"];
        //echo "Datos recibidos: Tipo de Promoción: $tipo_promo, Descripción: $descripcion_promo, Precio: $precio";
        agregarPromocion($tipo_promo, $descripcion_promo, $precio);
        global $promocionModel;
    } elseif ($solicitud == "reserva") {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $adultos = $_POST["adultos"];
        $niños = $_POST["niños"];
        $fecha_inicio = $_POST["fecha_inicio"];
        $fecha_fin = $_POST["fecha_fin"];
        $tipo_hab = $_POST["tipo_hab"];
        $tipo_servicio = $_POST["tipo_servicio"];
        $promoción = $_POST["promoción"];
        $huesped = $_POST["huesped"];
        $tarjeta = $_POST["tarjeta"];
        echo "Datos recibidos: Nombre: $nombre, Apellido: $apellido, Email: $email, Adultos: $adultos, Niños: $niños, Fecha Inicio: $fecha_inicio, Fecha Fin: $fecha_fin, Tipo de Habitación: $tipo_hab, Tipo de Servicio: $tipo_servicio, Promoción: $promoción, Huesped: $huesped, Tarjeta: $tarjeta";
        agregarReserva($nombre, $apellido, $email, $adultos, $niños, $fecha_inicio, $fecha_fin, $tipo_hab, $tipo_servicio, $promoción, $huesped, $tarjeta);
        global $reservaModel;
    } elseif ($solicitud == "servicio") {
        $tipo_servicio = $_POST["tipo_servicio"];
        $descripcion_servicio = $_POST["descripcion_servicio"];
        $imagen = $_POST["imagen"];
        echo "Datos recibidos: Tipo de Servicio: $tipo_servicio, Descripción: $descripcion_servicio, Imagen: $imagen";
        agregarServicio($tipo_servicio, $descripcion_servicio, $imagen);
        global $servicioModel;
    } elseif ($solicitud == "usuario") {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $celular = $_POST["celular"];
        echo "Datos recibidos: Nombre: $nombre, Apellido: $apellido, Email: $email, Celular: $celular";
        agregarUsuario($nombre, $apellido, $email, $celular);
        global $usuarioModel;
    }else{
        echo json_encode(["error" => "Ruta no encontrada"]);
    }}


?>
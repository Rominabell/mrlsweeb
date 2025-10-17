<?php
require_once 'componentes/encabezado.php';
require_once 'componentes/pie.php';

echo encabezado("AVOLAR - Detalle del paquete");


//recupero el ID del paquete desde la URL
$id_paquete = isset($_GET['id'])? intval(value:$_GET['id']): 0;
if ($id_paquete != null && $id_paquete > 0){

//consulto el paquete por ID
$paquete=$conexion->query("
    SELECT *
    FROM paquetes
    WHERE paquetes.id_paquete = $id_paquete AND (paquetes.estado = 'disponible' OR paquetes.estado = 'proximamente'
")->fetch_assoc();

if (!$paquetes){
    echo "<div class='alert alert-danger'> Paquete no encontrado o no disponible.</div>";
    exit;
} else {
//si encuentra el paquete, obtengo los servicios asociados y calculo todo junto para mostrarlo luego
    $servicios = $conexion->query("
    SELECT *
    FROM servicios JOIN paquete_servicio ON servicios.id_servicio = paquete_servicio.id_servicio
    WHERE paquete_servicio.id_paquete = $id_paquete; ")

//dias restantes  de reserva 
    $fechalimite = date_create(datetime: $paquetes['f_limite']);
    $hoy = new DateTime();
    $dias_restantes = $hoy->diff(targetObject: $fechaLimite)->format('%a')

//tiempo neto de estadia del paquete

    $f_inicio = date_create(datetime: $paquete['f_inicio']);
    $f_fin = date_create(datetime:$paquete['f_fin']);
    $dias_restantes = $hoy->diff(targetObject: $fechaLimite)->format('%a')

//cupo disponible
    $cupo_disponible = $paquetes ['cupo_total'] - $paquetes['cupo_reservado'];

} else {
    echo "<div class='alert alert-danger'>ID de paquete invalido.</div>";
    exit;
}

}
?>
<?php 
    require_once("../../Model/conexion.php");
    require_once("../../Model/consultas.php");

    $id_user = $_GET['id_user'];

    $objConsultas = new Consultas();
    $result = $objConsultas->eliminarEstadisticasPersonalizadasAdmin($id_user);
?>
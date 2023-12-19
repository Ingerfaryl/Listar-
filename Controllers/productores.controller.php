<?php
require_once '../Models/productores.php';
if(isset($_GET['tarea'])){
    $productor = new productores();
    
    if($_GET['tarea']=='listar'){
        $resultado = $productor->getAll();
        echo json_encode($resultado);
    }
    if($_GET['tarea']=='search'){
        $consulta = $productor -> buscarPublisher(["_publisher_id" => $_GET["_publisher_id"]]);
        echo json_encode($consulta);
    }
}
/* $pro = new productores();
$cons = $pro-> getAll();
echo json_encode($cons); */
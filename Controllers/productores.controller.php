<?php
require_once '../models/productores.php';
if(isset($_GET['tarea'])){
    $productor = new productores();
    if($_GET['tarea']=='search'){
        $respuesta = $productor -> search(["_idpublisher"=>$_GET['_idpublisher']]);
        echo json_encode($respuesta);
    }
}
$pro = new productores();
$resultado = $pro->search([4]);
echo json_encode($resultado);
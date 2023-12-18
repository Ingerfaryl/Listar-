<?php
require_once 'Conexion.php';
class productores extends Conexion{
    private $pdo;
    public function __construct(){
        $this ->pdo = parent::getConexion();
    }
    public function search($data=[]){
        try{
            $consulta = $this->pdo->prepare("CALL spu_resumen_publisher(?)");
            $consulta->execute(
                array($data['_idpublisher'])
            );
            return $consulta->fetchall(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            die($e->getMessage());
        }
    }
}
/* $productor = new productores();
$mostrar = $productor->search(["_idpublisher"=>4]);
var_dump($mostrar);  */
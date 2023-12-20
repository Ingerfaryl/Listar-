<?php
require_once 'Conexion.php';
class productores extends Conexion{
    private $pdo;
    public function __construct(){
        $this ->pdo = parent::getConexion();
    }
    public function getAll(){
        try{
            $consulta = $this ->pdo-> prepare('CALL spu_publisher_listar()');
            $consulta -> execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }   
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function buscarPublisher($data=[]){
        try{
            $consulta = $this->pdo->prepare("CALL spu_publisher_search(?)");
            $consulta->execute(
                array($data['_publisher_id'])
            );
            return $consulta->fetchall(PDO::FETCH_ASSOC);
        }catch (Exception $e){
        die($e->getMessage());
        }
    }
    public function searchListar(){
        try{
            $consulta = $this->pdo->prepare("CALL spu_publisher_listar()");
            $consulta -> execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function searchListarAlienacion($data=[]){
        try{
            $consutla = $this->pdo->prepare("CALL spu_resumen_alienacion_productor(?)");
            $consutla -> execute(
                array($data['idpublisher'])
            );
            return $consutla->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}
/* $productor = new productores();
$mostrar = $productor->searchListarAlienacion(['idpublisher'=>4]);
var_dump($mostrar); */
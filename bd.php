<?php
function abreConex()
{
    try {
        $conex = new PDO('mysql:host=localhost;dbname=prueba', 'root', '1234');
        $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conex;
    } catch (PDOException $p) {
        $p->getCode();
    }
}
    
function getAll()
{
    $conex=abreConex();
    $productos=[];
    $i=0;
    $resultado=null;

    try {
        $consulta = $conex->prepare('SELECT * FROM users');
        $consulta->execute();
        $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;

        /* while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $productos[$i]['id']=$fila['id'];
            $productos[$i]['nombre']=$fila['nombre'];
            $productos[$i]['img']=$fila['img'];
            $i++;
        } */

    } catch (PDOException $p) {
        return false;
    }

    $conex=null;
}

function userExists($nombre, $password)
{
    $conex=abreConex();
    $devolver = null;
    try {
        $consulta = $conex->prepare("SELECT * FROM USERS WHERE NOMBRE = :nombre AND PASSWORD = :password");
        $parametros = array(":nombre" => $nombre, ":password" => $password);
        $consulta->execute($parametros);
        $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $p) {
        $p->getCode();
    }
    
    $conex=null;
    return $resultado;
}

function getById($id)
{
    $conex=abreConex();
    $producto=[];
    $resultado = $conex->query("select * from producto where id = $id");
    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $productos['id']=$fila['id'];
        $productos['nombre']=$fila['nombre'];
        $productos['img']=$fila['img'];
    }   
    $conex=null;
    return $productos;
}

function deleteById($id)
{
    $conex=abreConex();
    $resultado = $conex->query("delete from producto where id = $id");
    $conex=null;
}


function newAlum($datos)
{
    $conex=abreConex();
    
    try {
        $consulta = $conex->prepare('INSERT INTO producto(nombre,img) VALUES (:nombre, :img)');
        $parametros = array(":nombre" => $datos['nombre'], ":nombre" => $datos['img']);
        $consulta->execute($parametros);
    } catch (PDOException $p) {
        $p->getCode();
    }
    
    $conex=null;
}
?>
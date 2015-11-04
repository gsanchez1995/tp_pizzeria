<?php 
require_once "AccesoDatos.php";

class Producto
{
    public $id;
    public $nombre;
    public $precio;
    public $foto;

    public static function InsertarProducto($nombre,$precio,$foto)
    {
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDatos->RetornarConsulta("CALL InsertarProducto(:paramNombre,:paramPrecio,:paramFoto)");
        //$consulta = $objetoAccesoDatos->RetornarConsulta("INSERT INTO productos(nombre,precio,foto) VALUES (:paramNombre,:paramPrecio,:paramFoto)");
        $consulta->bindValue(":paramNombre",$nombre,PDO::PARAM_STR);
        $consulta->bindValue(":paramPrecio",$precio,PDO::PARAM_INT);
        $consulta->bindValue(":paramFoto",$foto,PDO::PARAM_STR);
        $consulta->execute();
    }

    public static function TraerTodosLosProductos()
    {
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDatos->RetornarConsulta("CALL TraerTodosLosProductos()");
        //$consulta = $objetoAccesoDatos->RetornarConsulta("SELECT * FROM productos");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_CLASS,"Producto");
    }
    public static function TraerProductoPorId($id)
    {
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDatos->RetornarConsulta("CALL TraerProductoPorId(:paramId)");
        //$consulta = $objetoAccesoDatos->RetornarConsulta("SELECT * FROM productos WHERE id=:paramId");
        $consulta->bindValue(":paramId",$id,PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetchObject("Producto");
    }
    public static function ModificarProducto($nombre,$precio,$foto,$id)
    {
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDatos->RetornarConsulta("CALL ModificarProducto(:paramNombre,:paramPrecio,:paramFoto,:paramId)");
        //$consulta = $objetoAccesoDatos->RetornarConsulta("UPDATE productos SET nombre=:paramNombre,precio=:paramPrecio,foto=:paramFoto WHERE id=:paramId");
        $consulta->bindValue(":paramNombre",$nombre,PDO::PARAM_STR);
        $consulta->bindValue(":paramPrecio",$precio,PDO::PARAM_INT);
        $consulta->bindValue(":paramFoto",$foto,PDO::PARAM_STR);
        $consulta->bindValue(":paramId",$id,PDO::PARAM_INT);
        $consulta->execute();
    }
    public static function BorrarProducto($id)
    {
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDatos->RetornarConsulta("CALL BorrarProducto(:paramId)");
        //$consulta = $objetoAccesoDatos->RetornarConsulta("DELETE FROM productos WHERE id=:paramId");
        $consulta->bindValue(":paramId",$id,PDO::PARAM_INT);
        $consulta->execute();
    }
}
?>
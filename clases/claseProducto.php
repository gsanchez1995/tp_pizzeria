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
        $consulta = $objetoAccesoDatos->RetornarConsulta("INSERT INTO productos(nombre,precio,foto) VALUES (:paramNombre,:paramPrecio,:paramFoto)");
        $consulta->bindValue(":paramNombre",$nombre,PDO::PARAM_STR);
        $consulta->bindValue(":paramPrecio",$precio,PDO::PARAM_INT);
        $consulta->bindValue(":paramFoto",$foto,PDO::PARAM_STR);
        $consulta->execute();
    }

    public static function TraerTodosLosUsuarios()
    {
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDatos->RetornarConsulta("SELECT * FROM usuarios");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_CLASS,"Usuario");
    }
    public static function TraerUsuarioPorMailYClave($mail,$clave)
    {
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDatos->RetornarConsulta("SELECT * FROM usuarios WHERE mail=:paramMail AND clave=:paramClave");
        $consulta->bindValue(":paramMail",$mail,PDO::PARAM_STR);
        $consulta->bindValue(":paramClave",$clave,PDO::PARAM_STR);
        $consulta->execute();
        return $consulta->fetchObject("Usuario");
    }
    public static function ModificarUsuario($nombre,$mail,$clave)
    {
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDatos->RetornarConsulta("CALL ModificarUsuario(:paramNombre,:paramMail,:paramClave)");
        $consulta->bindValue(":paramNombre",$nombre,PDO::PARAM_STR);
        $consulta->bindValue(":paramMail",$mail,PDO::PARAM_STR);
        $consulta->bindValue(":paramClave",$clave,PDO::PARAM_STR);
        $consulta->execute();
    }
    public static function BorrarUsuario($id)
    {
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDatos->RetornarConsulta("CALL BorrarUsuario(:paramId)");
        $consulta->bindValue(":paramId",$id,PDO::PARAM_INT);
        $consulta->execute();
    }
}
?>
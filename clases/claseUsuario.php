<?php 
require_once "AccesoDatos.php";

class Usuario
{
    public $id;
    public $nombre;
    public $mail;
    public $clave;
    public $tipo;

    public static function InsertarUsuario($nombre,$mail,$clave,$tipo)
    {
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDatos->RetornarConsulta("INSERT INTO usuarios(nombre,mail,clave,tipo) VALUES (:paramNombre,:paramMail,:paramClave,:paramTipo)");
        $consulta->bindValue(":paramNombre",$nombre,PDO::PARAM_STR);
        $consulta->bindValue(":paramMail",$mail,PDO::PARAM_STR);
        $consulta->bindValue(":paramClave",$clave,PDO::PARAM_STR);
        $consulta->bindValue(":paramTipo",$tipo,PDO::PARAM_STR);
        $consulta->execute();
    }

    public static function TraerTodosLosUsuarios()
    {
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDatos->RetornarConsulta("SELECT * FROM usuarios");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_CLASS,"Usuario");
    }

    public static function TraerUsuarioPorMail($mail)
    {
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDatos->RetornarConsulta("SELECT * FROM usuarios WHERE mail=:paramMail");
        $consulta->bindValue(":paramMail",$mail,PDO::PARAM_STR);
        $consulta->execute();
        return $consulta->fetchObject("Usuario");
    }

    public static function TraerUsuarioPorId($id)
    {
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDatos->RetornarConsulta("SELECT * FROM usuarios WHERE id=:paramId");
        $consulta->bindValue(":paramId",$id,PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetchObject("Usuario");
    }

    public static function ModificarUsuario($id,$nombre,$mail,$clave)
    {
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDatos->RetornarConsulta("UPDATE usuarios SET nombre=:paramNombre,mail=:paramMail,clave=:paramClave WHERE id=:paramId");
        $consulta->bindValue(":paramNombre",$nombre,PDO::PARAM_STR);
        $consulta->bindValue(":paramMail",$mail,PDO::PARAM_STR);
        $consulta->bindValue(":paramClave",$clave,PDO::PARAM_STR);
        $consulta->bindValue(":paramId",$id,PDO::PARAM_INT);
        $consulta->execute();
    }

    public static function BorrarUsuario($id)
    {
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDatos->RetornarConsulta("DELETE FROM usuarios WHERE id=:paramId");
        $consulta->bindValue(":paramId",$id,PDO::PARAM_INT);
        $consulta->execute();
    }
}
?>
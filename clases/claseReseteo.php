<?php 
require_once "AccesoDatos.php";

class Reseteo
{
    public $id;
    public $mail;
    public $token;
    public $creado;

    public static function TraerTodosLosReseteos()
    {
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDatos->RetornarConsulta("CALL TraerTodosLosReseteos()");
        //$consulta = $objetoAccesoDatos->RetornarConsulta("SELECT * FROM reseteo");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_CLASS,"Reseteo");
    }

    public static function InsertarReseteo($mail,$token)
    {
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDatos->RetornarConsulta("CALL InsertarReseteo(:paramMail,:paramToken)");
        //$consulta = $objetoAccesoDatos->RetornarConsulta("INSERT into reseteopassword(mail,token) VALUES (:paramMail,:paramToken)");
        $consulta->bindValue(":paramMail",$mail,PDO::PARAM_STR);
        $consulta->bindValue(":paramToken",$token,PDO::PARAM_STR);
        $consulta->execute();
    }
}
?>
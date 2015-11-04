<?php 

require_once "AccesoDatos.php";

class Validadora
{
    public static function ValidarSesionIniciada()
    {
        if(isset($_SESSION['loginMail']))
        {
            $variable = strtotime("now")-strtotime($_SESSION['loginTiempo']);

            if($variable<3600)
            {
                $_SESSION['loginTiempo']=date("Y-M-d H:i:s");
                return true;
            }
        }
        return false;
    }
}
?>
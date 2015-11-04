<?php 
require_once "AccesoDatos.php";

class Venta
{
    public $id;
    public $pedido;
    public $precio;
    public $provincia;
    public $localidad;
    public $direccion;
    public $tipo;
    public $promocion;
    public $vendedor;

    public static function InsertarVenta($pedido,$precio,$provincia,$localidad,$direccion,$tipo,$promocion,$id_vendedor)
    {
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDatos->RetornarConsulta("CALL InsertarVenta(:paramPedido,:paramPrecio,:paramProvincia,:paramLocalidad,:paramDireccion,:paramTipo,:paramPromocion,:paramId_vendedor)");
        //$consulta = $objetoAccesoDatos->RetornarConsulta("INSERT INTO ventas(pedido,precio,provincia,localidad,direccion,tipo,promocion,id_vendedor) VALUES (:paramPedido,:paramPrecio,:paramProvincia,:paramLocalidad,:paramDireccion,:paramTipo,:paramPromocion,:paramId_vendedor)");
        $consulta->bindValue(":paramPedido",$pedido,PDO::PARAM_STR);
        $consulta->bindValue(":paramPrecio",$precio,PDO::PARAM_INT);
        $consulta->bindValue(":paramProvincia",$provincia,PDO::PARAM_STR);
        $consulta->bindValue(":paramLocalidad",$localidad,PDO::PARAM_STR);
        $consulta->bindValue(":paramDireccion",$direccion,PDO::PARAM_STR);
        $consulta->bindValue(":paramTipo",$tipo,PDO::PARAM_STR);
        $consulta->bindValue(":paramPromocion",$promocion,PDO::PARAM_STR);
        $consulta->bindValue(":paramId_vendedor",$id_vendedor,PDO::PARAM_INT);
        $consulta->execute();
    }

    public static function TraerTodasLasVentas()
    {
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDatos->RetornarConsulta("CALL TraerTodasLasVentas()");
        //$consulta = $objetoAccesoDatos->RetornarConsulta("SELECT * FROM ventas");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_CLASS,"Venta");
    }
}
?>
<?php 

require_once 'clases/claseProducto.php';

if(!isset($_FILES["fileFoto"]))
	{
		// no se cargo una imagen
	}
	else
	{
		if($_FILES["fileFoto"]['error'])
		{
			//error de imagen
		}
		else
		{
			$tamanio =$_FILES['fileFoto']['size'];
    		if($tamanio>1024000)
    		{
    				// "Error: archivo muy grande!"."<br>";
    		}
    		else
    		{
    			//OBTIENE EL TAMAÑO DE UNA IMAGEN, SI EL ARCHIVO NO ES UNA
				//IMAGEN, RETORNA FALSE
				$esImagen = getimagesize($_FILES["fileFoto"]["tmp_name"]);
				if($esImagen === FALSE) 
				{
							//NO ES UNA IMAGEN
				}
				else
				{
					$NombreCompleto=explode(".", $_FILES['fileFoto']['name']);
					$Extension=  end($NombreCompleto);
					$arrayDeExtValida = array("jpg", "jpeg", "gif", "bmp", "png");  //defino antes las extensiones que seran validas
					if(!in_array($Extension, $arrayDeExtValida))
					{
					   //"Error archivo de extension invalida";
					}
					else
					{
						//$destino =  "fotos/".$_FILES["foto"]["name"];
						$destino = "imagenes/". $_POST['txtNombre'].".".$Extension;
						$foto=$_POST['txtNombre'].".".$Extension;
						//MUEVO EL ARCHIVO DEL TEMPORAL AL DESTINO FINAL
    					if (move_uploaded_file($_FILES["fileFoto"]["tmp_name"],$destino))
    					{	
    						Producto::InsertarProducto($_POST["txtNombre"],$_POST['txtPrecio'],$foto);

    						header("location:index.php");
      					}
      					else
      					{   
      						echo "no";
      					}



					}

				}
    		}			
		}
	}

?>
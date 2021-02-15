<?php 
//Incluímos inicialmente la conexión a la base de datos
require "./config/Conexion.php";

Class RequestOrder
{


	//Implementamos nuestro constructor
	public function __construct()
	{

	}


	public function ultimoNumero()
	{
		$sql="SELECT ds.numeroPedido from detalleservicio ds order by id desc limit 1";
		return ejecutarConsulta($sql);
	}


	//Implementamos un método para insertar registros
	public function insertar($servicio,$usuario,$numeroPedido,$descripcion,$cantidad,$valorUnitario,$valorTotal,$cliente,$telefono,$Direccion,$txtAddicional,$fecha,$formaPago,$estado) {

		$sql="INSERT INTO detalleservicio (servicio,usuario,numeroPedido,descripcion,cantidad,valorUnitario,valorTotal,cliente,telefono,Direccion,algoMas,fecha,formaPago,estado)
		VALUES ('$servicio','$usuario','$numeroPedido','$descripcion','$cantidad','$valorUnitario','$valorTotal','$cliente','$telefono','$Direccion','$txtAddicional','$fecha','$formaPago','$estado')";
		return ejecutarConsulta($sql);
	}

	public function ConsultStock($idServicio){
		$sql="SELECT cantidad FROM servicio WHERE id='$idServicio'";
		return ejecutarConsulta($sql);
	}




	
	

	//______________________________________________________




}

?>
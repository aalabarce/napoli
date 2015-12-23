<?php
ini_set("display_errors", 1);
require_once 'excel_reader2.php';
?>
<html>
<head>
</head>

<body>
<?php require('SpreadsheetReader.php');?>
<?php 

$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = mysql_connect($servername, $username, $password);
mysql_select_db('napoli');

$rubros = ["ADEREZOS", "ALMACEN", "BEBIDAS", "CARNICERIA", "CONGELADOS", "CONSERVAS", "COPETIN", "FIAMBRERIA", "GOLOSINAS", "LACTEOS", "MASCOTAS", "PANADERIA", "PASTAS", "PERFUMERIA Y LIMPIEZA", "VARIOS", "VERDULERIA"];

//var_dump($Reader);die;
foreach ($rubros as $key => $r) {

	$Reader = new SpreadsheetReader('excels/' . $r .  '.xlsx');
	$id_tabla = $key + 1;
	
	foreach ($Reader as $Row)
	{
		//echo utf8_decode($Row[1]) . "<br>";
	    $sql = "INSERT INTO producto ".
	       "(cod_proveedor, descripcion, unidad_medida, uxb, rubro) ".
	       "VALUES ".
	       "('$Row[0]', '" . utf8_decode($Row[1]) . "','$Row[2]', '$Row[3]', " . $id_tabla . ")";
	    mysql_query( $sql, $conn );
	}
}



$sql2 = "DELETE FROM producto WHERE descripcion = '' OR descripcion = 'Descripción'";

mysql_query( $sql, $conn );


echo "success";



/*$Reader = new SpreadsheetReader('excels/PERFUMERIA Y LIMPIEZA.xlsx');
//var_dump($Reader);die;
foreach ($Reader as $Row)
{
	//echo utf8_decode($Row[1]) . "<br>";
    $sql = "INSERT INTO producto ".
       "(cod_proveedor, descripcion, unidad_medida, uxb, rubro) ".
       "VALUES ".
       "('$Row[0]', '" . utf8_decode($Row[1]) . "','$Row[2]', '$Row[3]', 14)";
    mysql_query( $sql, $conn );
}
*/
 ?>
</body>
</html>

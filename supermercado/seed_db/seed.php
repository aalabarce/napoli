<?php
ini_set("display_errors", 1);
require_once 'excel_reader2.php';
?>
<html>
<head>
<style>
table.excel {
	border-style:ridge;
	border-width:1;
	border-collapse:collapse;
	font-family:sans-serif;
	font-size:12px;
}
table.excel thead th, table.excel tbody th {
	background:#CCCCCC;
	border-style:ridge;
	border-width:1;
	text-align: center;
	vertical-align:bottom;
}
table.excel tbody th {
	text-align:center;
	width:20px;
}
table.excel tbody td {
	vertical-align:bottom;
}
table.excel tbody td {
    padding: 0 3px;
	border: 1px solid #EEEEEE;
}
</style>
</head>

<body>
<?php require('SpreadsheetReader.php');?>
<?php 


$Reader = new SpreadsheetReader('articulo.xlsx');

$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = mysql_connect($servername, $username, $password);
mysql_select_db('napoli');



foreach ($Reader as $Row)
{
    $sql = "INSERT INTO producto ".
       "(cod_proveedor, descripcion, unidad_medida, uxb) ".
       "VALUES ".
       "('$Row[0]', '" . htmlentities($Row[1]) . "','$Row[2]', '$Row[3]')";
    mysql_query( $sql, $conn );
}
 ?>
</body>
</html>

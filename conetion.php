<?php

$serverName = "localhost"; 
// o "localhost\\SQLEXPRESS" si usas esa instancia

$connectionInfo = [
    "Database" => "ParqueCentral",
    "UID" => "VITERVO\SQLEXPRESS",
    "PWD" => "",
    "CharacterSet" => "UTF-8"
];

$conn = \sqlsrv_connect($serverName, $connectionInfo);

if ($conn === false) {
    die(print_r(\sqlsrv_errors(), true));
}

echo "✅ Conexión exitosa a SQL Server";
?>
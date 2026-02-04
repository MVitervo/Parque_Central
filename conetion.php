<?php

$serverName = "localhost,1433";

$connectionInfo = [
    "Database" => "ParqueCentral",
    "CharacterSet" => "UTF-8"
];

$conn = sqlsrv_connect($serverName, $connectionInfo);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

echo "✅ Conexión exitosa a SQL Server";

?>
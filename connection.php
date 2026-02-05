<?php
//configuracion de conexion a db
// $dbuser = "sa";
// $dbpassword = "12345678";
// $dsn = "sqlsrv:Server=localhost\\SQLEXPRESS;Database=materiales;IntegratedSecurity=true";
$dsn = "sqlsrv:Server=VITERVO\\SQLEXPRESS;Database=ParqueCentral";

try {
    //crear conexion sqlerver
    // $conn = new PDO($dsn,$dbuser,$dbpassword); 
    $conn = new PDO($dsn); 
     
    //Mostrar si la conexion es correcta
    echo 'success';
 

//asignacion de la excepcion a la variable $e
}   catch (PDOException $e){

    //si hay error en la conexion mostrarlo
    echo $e->getMessage();
}

    /*
    getMessage(): Devuelve el mensaje de error.
getCode(): Devuelve el código de error (un número que indica el tipo de error).
getFile(): Devuelve el archivo donde se lanzó la excepción.
getLine(): Devuelve la línea en el archivo donde se lanzó la excepción.
getTraceAsString(): Devuelve el rastro (trace) completo de la excepción, lo que te permite ver la pila de llamadas (stack trace) que llevó al error.
        

*/
?>
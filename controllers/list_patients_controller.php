<?php

header('Content-Type: application/json');
require_once __DIR__ . '/../connection.php';

$response = array();

try {
    $queryGetPatients = $conn->prepare("SELECT * FROM Patients_tbl ORDER BY id DESC");

    $queryGetPatients->execute();
    
    while ($result = $queryGetPatients->fetch(PDO::FETCH_ASSOC)) {
        // Inserta la fila actual
        $row = array(
            'Name' => $result['Name'],
            'Lastname' => $result['Lastname'],
            'CURP' => $result['CURP'],
            'RFC' => $result['RFC']
        );
        $response[] = $row;
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

echo json_encode($response);


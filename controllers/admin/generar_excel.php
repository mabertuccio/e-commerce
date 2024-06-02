<?php

include '../bbdd.php';

// Función para obtener las columnas de una consulta SQL
function obtenerColumnas(PDOStatement $stmt): array
{
    $columnas = array();
    for ($i = 0; $i < $stmt->columnCount(); $i++) {
        $meta = $stmt->getColumnMeta($i);
        $columnas[] = $meta['name'];
    }
    return $columnas;
}
function ejecutarConsulta(PDO $conn, string $sql): array
{
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Función para generar y descargar un archivo Excel
function generarExcel(array $columnas, array $resultados)
{
    // Crear un archivo temporal para guardar los datos
    $filename = tempnam(sys_get_temp_dir(), 'excel');
    $file = fopen($filename, 'w');

    // Escribir los nombres de las columnas en el archivo Excel
    fputcsv($file, $columnas, "\t");

    // Escribir los datos en el archivo Excel
    // Utilizar un delimitador específico (por ejemplo, tabulación)
    foreach ($resultados as $fila) {
        fputcsv($file, $fila, "\t");
    }

    // Cerrar el archivo
    fclose($file);

    // Configurar las cabeceras para indicar que se va a descargar un archivo Excel
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="informacion.xls"');
    header('Cache-Control: max-age=0');

    // Leer el archivo temporal y enviar su contenido al navegador
    readfile($filename);

    // Eliminar el archivo temporal
    unlink($filename);
}
if (isset($_GET['datos'])) {
    $tabla = $_GET['datos'];
    if ($tabla === 'usuarios') {
        $sql = "SELECT id, email, tipo_usuario, estado FROM $tabla";
    } elseif ($tabla === 'productos') {
        $sql = "SELECT * FROM $tabla";
    } elseif ($tabla === 'proveedores') {
        $sql = "SELECT * FROM $tabla";
    }

    // Ejecutar la consulta SQL
    $resultados = ejecutarConsulta($conn, $sql);

    // Obtener las columnas de la consulta SQL
    $columnas = obtenerColumnas($conn->query($sql));

    // Generar y descargar el archivo Excel

    generarExcel($columnas, $resultados);
}

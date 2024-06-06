<?php
include '../bbdd.php';
require_once('../../libs/fpdf.php');
// Verifica si se recibió el parámetro id en la URL
if (isset($_GET['id'])) {
    // Obtiene el id de la factura
    $facturaId = $_GET['id'];

    // Aquí deberías generar el PDF con FPDF utilizando la información de la factura
    // Ejemplo:
    try {
        $sql = "SELECT i.id_factura, i.cantidad, i.precio_unitario AS 'Precio del producto', f.precio_total AS 'Precio total', f.fecha AS 'Fecha de compra', u.email AS 'Cliente', p.nombre AS 'nombreproducto'
            FROM items_factura AS i
            INNER JOIN facturas AS f ON f.id = i.id_factura
            INNER JOIN usuarios AS u ON f.id_usuario = u.id
            INNER JOIN productos AS p ON p.id = i.id_producto
            WHERE i.id_factura = :id_factura";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id_factura', $facturaId, PDO::PARAM_INT);
        $stmt->execute();
        $facturas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($facturas) > 0) {

            $pdfContent = '';
            foreach ($facturas as $factura) {
                $pdfContent .= 'Factura ID: ' . $factura['id_factura'] . "\n";
                $pdfContent .= 'Cliente: ' . $factura['Cliente'] . "\n";
                $pdfContent .= 'Fecha: ' . $factura['Fecha de compra'] . "\n";
                $pdfContent .= 'Producto: ' . $factura['nombreproducto'] . "\n";
                $pdfContent .= 'Cantidad: ' . $factura['cantidad'] . "\n";
                $pdfContent .= 'Precio Unitario: ' . $factura['Precio del producto'] . "\n";
                $pdfContent .= 'Precio Total: ' . $factura['Precio total'] . "\n\n";
            }

            // Crear el PDF y enviarlo al navegador
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->MultiCell(0, 10, $pdfContent);
            $pdf->Output('I', 'factura_' . $facturaId . '.pdf');
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    // Si no se recibió el parámetro id, muestra un mensaje de error
    echo "Error: No se especificó el ID de la factura.";
}

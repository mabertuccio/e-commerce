<?php
include '../bbdd.php';
require_once('../../libs/fpdf.php');

function obtenerDatosFactura($conn)
{
    $sql = "SELECT i.id_factura, i.cantidad, i.precio_unitario AS 'Precio del producto', f.precio_total AS 'Precio total', f.fecha AS 'Fecha de compra', u.email AS 'Cliente', p.nombre AS 'nombreproducto'
    FROM items_factura AS i
    INNER JOIN facturas AS f ON f.id = i.id_factura
    INNER JOIN usuarios AS u ON f.id_usuario = u.id
    INNER JOIN productos AS p ON p.id = i.id_producto";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $facturas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $facturas;
}


class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Encabezado
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Facturas', 0, 1, 'C');
        $this->Ln(10);

        // Encabezados de tabla
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(20, 10, 'Factura', 1);
        $this->Cell(40, 10, 'Cliente', 1);
        $this->Cell(40, 10, 'Producto', 1);
        $this->Cell(20, 10, 'Cantidad', 1);
        $this->Cell(30, 10, 'Precio Unitario', 1);
        $this->Cell(30, 10, 'Precio Total', 1);
        $this->Cell(30, 10, 'Fecha', 1);
        $this->Ln();
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

try {
    $facturas = obtenerDatosFactura($conn);

    $pdf = new PDF('L');
    $pdf->AliasNbPages();
    $pdf->AddPage();

    // Agregar contenido de la tabla
    foreach ($facturas as $factura) {
        $pdf->Cell(20, 10, $factura['id_factura'], 1);
        $pdf->Cell(40, 10, $factura['Cliente'], 1);
        $pdf->Cell(40, 10, $factura['nombreproducto'], 1);
        $pdf->Cell(20, 10, $factura['cantidad'], 1);
        $pdf->Cell(30, 10, $factura['Precio del producto'], 1);
        $pdf->Cell(30, 10, $factura['Precio total'], 1);
        $pdf->Cell(30, 10, $factura['Fecha de compra'], 1);
        $pdf->Ln();
    }

    // Salida del PDF
    $pdf->Output('I');
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}

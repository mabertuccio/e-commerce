function openPDF(id) {
  // Abre una nueva ventana del navegador con la URL del controlador PHP que genera el PDF
  try {
    window.open(
      '../../controllers/admin/generar_pdf_factura.php?id=' + id,
      '_blank'
    );
  } catch (error) {
    console.log(error);
  }
}

function openPDFList() {
  window.open('../../controllers/admin/generar_pdf.php', '_blank');
}

<?php

include('../../../app/config.php');

$ticketid_get = $_GET['id'];

$sql_pagoss = "SELECT * FROM facturacion WHERE id_factura = '$ticketid_get'";
$query_pagoss = $pdo->prepare($sql_pagoss);
$query_pagoss->execute();
$datos_pagoss = $query_pagoss->fetchAll(fetch_style: PDO::FETCH_ASSOC);

foreach ($datos_pagoss as $dato_pagoss){
    $clienteRep = $dato_pagoss['cliente'];
    $marcaVeh = $dato_pagoss['marcaveh'];
    $modelVeh = $dato_pagoss['modelveh'];
    $placaVeh = $dato_pagoss['placaveh'];
    $teleClient = $dato_pagoss['telefonoclient'];
    $codeBarra = $dato_pagoss['codebarra'];
    $descripRepa = $dato_pagoss['descripcionrepa'];
    $gastoRep = $dato_pagoss['gastorep'];
    $montoRep = $dato_pagoss['montorep'];
    $pagoTot = $dato_pagoss['pagototal'];

}



	# Incluyendo librerias necesarias #
    require "./code128.php";

    $pdf = new PDF_Code128('P','mm',array(80,185));
    $pdf->SetMargins(4,10,4);
    $pdf->AddPage();
    
    # Encabezado y datos de la empresa #
    $pdf->SetFont('Arial','B',10);
    $pdf->SetTextColor(0,0,0);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("TALLER HERRERA")),0,'C',false);
    $pdf->SetFont('Arial','',9);
    $pdf->Ln(3);
    $pdf->MultiCell(0,5,utf8_decode("Direccion: San Miguel, El Salvador"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Teléfono: 2121-2828"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Email: correo@ejemplo.com"),0,'C',false);

    $pdf->Ln(1);
    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    $pdf->MultiCell(0,5,utf8_decode("Fecha: ".$fechaticket."      Hora: ".$horaticket),0,'C',false);
    $pdf->Ln(3);
    $pdf->SetFont('Arial','B',10);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("Ticket Nro: ".$ticketid_get)),0,'C',false);
    $pdf->SetFont('Arial','',9);

    $pdf->Ln(1);
    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    $pdf->MultiCell(0,5,utf8_decode("Cliente: ".$clienteRep),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Vehiculo: ".$marcaVeh." ".$modelVeh),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Placas: ".$placaVeh),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Teléfono: ".$teleClient),0,'C',false);

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);

    # Tabla de productos #
    $pdf->Cell(18,5,utf8_decode("Descripcion:"),0,0,'C');
    $pdf->Cell(35,5,utf8_decode("Gasto repuestos:"),0,0,'C');
    $pdf->Cell(20,5,utf8_decode("Reparacion:"),0,0,'C');

    $pdf->Ln(3);
    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);



    /*----------  Detalles de la tabla  ----------*/
    $pdf->Ln(4);
    $pdf->Cell(18,2,utf8_decode($descripRepa),15,0,'L');
    $pdf->Ln(4);
    $pdf->Cell(65,16,utf8_decode("$".$gastoRep." USD"),0,0,'C');
    $pdf->Cell(-8,16,utf8_decode("$".$montoRep." USD"),0,0,'C');
    $pdf->Ln(8);
    /*----------  Fin Detalles de la tabla  ----------*/

    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');

    $pdf->Ln(5);

    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("TOTAL A PAGAR"),0,0,'C');
    $pdf->Cell(31,5,utf8_decode("$".$pagoTot." USD"),0,0,'R');

    $pdf->Ln(10);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(0,7,utf8_decode("Gracias por su preferencia"),'',0,'C');

    $pdf->Ln(9);


    # Codigo de barras #
    $pdf->Code128(5,$pdf->GetY(),$codeBarra,70,20);
    $pdf->SetXY(0,$pdf->GetY()+21);
    $pdf->SetFont('Arial','',14);
    $pdf->MultiCell(0,5,utf8_decode($codeBarra),0,'C',false);
    
    # Nombre del archivo PDF #
    $pdf->Output("I","Ticket_Nro_".$ticketid_get.".pdf",true);
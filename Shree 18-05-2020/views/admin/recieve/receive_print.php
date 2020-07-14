<?php
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 050');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 050', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
// ---------------------------------------------------------
// set style for barcode
$style = array(
    'position' => 'L',
    'align' => 'L',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => false,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => TRUE,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);
// set font

$pdf->SetFont('times', 'B', 9,'', 'false');

// $date = my_date_show($data->created_date);
// add a page
$pdf->AddPage();

// chmod($image_file, 0600);

/*$style['position'] = 'L';
$pdf->write1DBarcode($data->barCode, 'C128', '', 30, '', 16, 0.4, $style, 'T');
$style['position'] = 'C';
$pdf->write1DBarcode($data->barCode, 'C128', '', 30, '', 16, 0.4, $style, 'T');
$style['position'] = 'R';
$pdf->write1DBarcode($data->barCode, 'C128', '', 30, '', 16, 0.4, $style, 'T');
$pdf->Ln(0);*/


$html = <<<EOD
<style>

.main-text{
  text-align:left;
}
</style>
<h2>PLAIN G. PROGRAM LABLE</h2>
<table border="1" height="5in" width="6in" style="padding:10px 10px 10px 20px;">
    <tr>
      <td>
        <table>
          <tr>
            <td rowspan="4" width="120px">BARCODE HERE</td>
            <td width="90px">SIZE</td>
            <td width="150px">:- ……………UNIT VALUE</td>
            <td width="140px">KARIGAR :-</td>
          </tr>
          <tr>
            <td width="90px">FABRIC</td>
            <td width="150px">:- ……………………………</td>
            <td collspan="2" width="140px">……………………………</td>
          </tr>
          <tr>
            <td width="90px">OD NO</td>
            <td width="150px">:- ……………………………</td>
          </tr>
          <tr>
            <td width="90px">DESIGN NAME</td>
            <td width="150px">:- ……………………………</td>
            <td>CUTTING :-</td>
          </tr>
          <tr>
            <td rowspan="3">BARCODE HERE</td>
            <td width="90px">DESIGN CODE</td>
            <td width="150px">:- ……………………………</td>
            <td collspan="2">……………………………</td>
          </tr>
          <tr>
            <td width="90px">STITCH</td>
            <td width="150px">:- ……………………………</td>
          </tr>
          <tr>
            <td width="90px">DYE</td>
            <td width="150px">:- ……………………………</td>
            <td>CHECKING :-</td>
          </tr>
          <tr>
            <td width="120px">CUST.NAME</td>
            <td width="240px" colspan="2">:- …………………………………………………</td>
            <td colspan="2">……………………………</td>
          </tr>
          <tr>
            <td width="120px">MATCHING</td>
            <td width="240px" colspan="2">:- …………………………………………………</td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
EOD;

$pdf->writeHTML($html, true, false, true, false, '');
//Close and output PDF document



$pdf->Output('example_050.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

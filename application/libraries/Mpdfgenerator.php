<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("./vendor/autoload.php");
//use Dompdf\Dompdf;
//use Dompdf\Options;

class Mpdfgenerator {

  public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
  {
    //$options = new Options();
    //$options->setIsRemoteEnabled(true);
   // $dompdf = new DOMPDF();
   // $dompdf->set_option('setIsRemoteEnabled', 'True');
   // $dompdf->setOptions($options);
   // $dompdf->loadHtml($html);
    //$dompdf->setPaper($paper, $orientation);
    //$dompdf->render();
    //$output = $dompdf->output();
   // $dir ="assets/pdfs";
   // file_put_contents($filename.".pdf", $output);
   // return $filename;

   $mpdf = new \Mpdf\Mpdf();
   $mpdf->WriteHTML($html);
   $mpdf->Output();
  }
   }
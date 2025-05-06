<?php
use setasign\Fpdi\TcpdfFpdi;

class PdfSigner extends TcpdfFpdi
{
    public function __construct()
    {
        parent::__construct();
    }

    public function signPdf($sourcePath, $outputPath, $certPath, $keyPath, $keyPassword, $imagePath = null)
    {
        $pageCount = $this->setSourceFile($sourcePath);

        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
            $tplIdx = $this->importPage($pageNo);
            $this->AddPage();
            $this->useTemplate($tplIdx);
        }

        $this->setSignature(
            'file://' . $certPath,
            'file://' . $keyPath,
            $keyPassword,
            '',
            2,
            [
                'Name' => 'John Doe',
                'Location' => 'Athens, GR',
                'Reason' => 'Document approval',
                'ContactInfo' => 'john@example.com'
            ]
        );

        // Optional: Visible signature
        if ($imagePath) {
            $this->setSignatureAppearance(150, 260, 40, 15);
            $this->Image($imagePath, 150, 260, 40, 15, 'PNG');
        }

        $this->Output($outputPath, 'F');
    }
}
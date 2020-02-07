<?php

namespace Libraries\Generatables\Extensions;

use FPDF;
use Libraries\Contracts\Generatable;

class FpdfProcessor implements Generatable
{
    public $pdf;

    protected $data;

    protected $options;

    /**
     * generate function
     *
     * @param array $data
     * @param array $options
     *
     * @return void
     */
    public function generate($data, $options = [])
    {
        $this->data = $data;

        $this->options = $options;

        $this->initPDF();
    }

    /**
     * make the generated document to be downloaded only
     *
     * @return void
     */
    public function download($filename)
    {
        return $this->pdf->Output($filename.'.pdf', 'D');
    }
    
    /**
     * Output the generated PDF to Browser
     *
     * @return void
     */
    public function stream($filename)
    {
        return $this->pdf->Output($filename.'.pdf', 'I');
    }

    protected function initPDF()
    {
        $this->pdf = new FPDF();
        
        $this->pdf = include_once $this->options['view'];
    }
}

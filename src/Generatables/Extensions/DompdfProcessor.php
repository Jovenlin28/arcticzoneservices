<?php

namespace Libraries\Generatables\Extensions;

use Dompdf\Dompdf;
use Libraries\Contracts\Generatable;

class DompdfProcessor implements Generatable
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

        $this->initPDF(new Dompdf());
    }

    /**
     * make the generated document to be downloaded only
     *
     * @return void
     */
    public function download($filename)
    {
        return $this->output($filename, true);
    }
    
    /**
     * Output the generated PDF to Browser
     *
     * @return void
     */
    public function stream($filename)
    {
        return $this->output($filename);
    }

    private function output($filename, $attachment = false)
    {
        return $this->pdf->stream($filename, array("Attachment" => $attachment));
    }

    protected function initPDF($pdf)
    {
        // instantiate and use the dompdf class
        $this->pdf = $pdf;

        // html file
        $this->pdf->loadHtml($this->getView($this->options['view']));

        // setup the paper size and orientation
        $this->pdf->setPaper('letter', 'portrait');

        $this->pdf->set_option('isHtml5ParserEnabled', true);

        // Render the HTML as PDF
        $this->pdf->render();
    }

    protected function getView($location)
    {
        ob_start();

        include_once $location;

        return ob_get_clean();
    }
}

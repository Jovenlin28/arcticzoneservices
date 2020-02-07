<?php

namespace Libraries\Contracts;

interface Generatable
{
    /**
     * generate function
     *
     * @param array $data
     * @param array $options
     *
     * @return void
     */
    public function generate($data, $options = []);

    /**
     * make the generated document to be downloaded only
     *
     * @return void
     */
    public function download($filename);
    
    /**
     * Output the generated PDF to Browser
     *
     * @return void
     */
    public function stream($filename);
}

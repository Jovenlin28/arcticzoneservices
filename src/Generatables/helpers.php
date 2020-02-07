<?php

use Libraries\Generatables\Reports\Report;

if (! function_exists('report')) {
    /**
     * report function
     *
     * @param string $name  report type
     * @param array $data
     * @param array $options
     *
     * @return Libraries\Generatables\Reports\Report
     */
    function report($name, $data = [], $options = [], $output = true)
    {
        return new Report($name, $data, $options);
    }
}
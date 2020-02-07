<?php

namespace Libraries\Generatables\Reports;

use Libraries\Generatables\Factory as ReportFactory;

class Report extends ReportFactory
{
    /**
     * lists of registered reports
     *
     * @var array
     */
    protected $lists = [
        'report1' => \Libraries\Generatables\Reports\Report1::class,
        'report2' => \Libraries\Generatables\Reports\Report2::class,
        'report3' => \Libraries\Generatables\Reports\Report3::class,
    ];
}

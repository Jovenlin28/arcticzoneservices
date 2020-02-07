<?php

// initize composer autoload, generatables config
require '../config.inc.php';

report('report2', [], ['view' => VIEW_DIR.'\report2.php'])->stream('report2');

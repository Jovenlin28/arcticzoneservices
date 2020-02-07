<?php

// initize composer autoload, generatables config
require '../config.inc.php';

report('report1', [], ['view' => VIEW_DIR.'\report1.php'])->stream('report1');

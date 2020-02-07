<?php

// initize composer autoload, generatables config
require '../config.inc.php';

report('report3', [], ['view' => VIEW_DIR.'\report3.php'])->stream('report3');

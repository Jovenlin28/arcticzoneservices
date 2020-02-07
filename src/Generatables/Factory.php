<?php

namespace Libraries\Generatables;

use Exception;

abstract class Factory
{
    /**
     * lists of registered documents
     *
     * @var array
     */
    protected $lists;

    /**
     * the registered document
     *
     * @var object
     */
    private $document;

    /**
     * init and handles the data
     *
     * @param string $name
     * @param array $data
     */
    public function __construct($name, $data = [], $options = [])
    {
        if (! array_key_exists($name, $this->lists)) {
            throw new Exception($name.' is not a valid document!');
        }

        $this->document = new $this->lists[$name];

        $this->document->generate($data, \array_merge([
            'generatables_dir' => ''
        ], $options));
    }

    /**
     * make the generated document to be downloaded only
     *
     * @return void
     */
    public function download($filename)
    {
        return $this->document->download($filename);
    }
    
    /**
     * Output the generated PDF to Browser
     *
     * @return void
     */
    public function stream($filename)
    {
        return $this->document->stream($filename);
    }
}

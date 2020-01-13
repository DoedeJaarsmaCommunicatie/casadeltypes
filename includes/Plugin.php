<?php

namespace CasaDelTypes;

class Plugin
{

    /**
     * The plugin options class.
     *
     * @var Options $options
     */
    protected $options;


    /**
     * The plugin register class.
     *
     * @var Registers $registers
     */
    protected $registers;

    /**
     * Initialize the plugin.
     */
    public function init()
    {
        $this->options = new Options();

        $this->registers = new Registers();
    }
}

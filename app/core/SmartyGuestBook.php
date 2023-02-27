<?php

class SmartyGuestBook extends Smarty
{
    public function __construct()
    {
        parent::__construct();

        $this->setTemplateDir('app/views/templates/');
        $this->setCompileDir('app/views/templates_c/');
        $this->setConfigDir('app/views/configs/');
        $this->setCacheDir('app/views/cache/');
    }
}

<?php

class SmartyGuestBook extends Smarty
{
    public function __construct()
    {
        parent::__construct();

        $this->setTemplateDir('templates/');
        $this->setCompileDir('templates_c/');
        $this->setConfigDir('configs/');
        $this->setCacheDir('cache/');

        $this->assign('app_name', 'Guest Book');
    }
}

<?php

class MainController extends Controller
{

    function __construct()
    {
        $this->model = new MainModel();
        $this->view = new View();
        $this->nameView = 'main_view.tpl';
    }

    public function sort($sort): void
    {
        $data = $this->model->getDataSort($sort[0]);
        $this->view->generate($this->nameView, $data, $sort[0]);
    }
}

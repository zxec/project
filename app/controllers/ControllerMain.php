<?php

class ControllerMain extends Controller
{

    function __construct()
    {
        $this->model = new ModelMain();
        $this->view = new View();
        $this->nameView = 'main_view.php';
    }

    public function sort($sort): void
    {
        $data = $this->model->getDataSort($sort[0]);
        $this->view->generate('main_view.php', $data, $sort[0]);
    }
}
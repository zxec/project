<?php

class ControllerMain extends Controller
{
    function __construct()
    {
        $this->model = new ModelMain();
        $this->view = new View();
    }

    public function index(): void
    {
        $data = $this->model->getData();
        $this->view->generate('main_view.php', $data);
    }

    public function sort($sort): void
    {
        $data = $this->model->getDataSort($sort[0]);
        $this->view->generate('main_view.php', $data, $sort[0]);
    }
}
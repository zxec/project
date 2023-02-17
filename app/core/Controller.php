<?php

abstract class Controller
{
    protected Model $model;
    protected View $view;
    protected string $nameView;

    public function index(): void
    {
        $data = $this->model->getData();
        $this->view->generate($this->nameView, $data);
    }
}
<?php

class ControllerCountry extends Controller
{
    public function __construct()
    {
        $this->model = new ModelCountry();
        $this->view = new View();
    }

    public function index(): void
    {
        $data = $this->model->getData();
        $this->view->generate('country_view.php', $data);
    }

    public function create(): void
    {
        if (!empty($_POST)) {
            $countryName = trim(htmlspecialchars($_POST['country_name']));

            if (!empty($countryName)) {
                $this->model->create($countryName);
            }
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function destroy(): void
    {
        if (!empty($_POST)) {
            $id = $_POST['country_id'];
            $this->model->delete($id);
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
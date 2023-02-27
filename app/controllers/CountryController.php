<?php

class CountryController extends Controller
{

    public function __construct()
    {
        $this->model = new CountryModel();
        $this->view = new View();
        $this->nameView = 'country_view.tpl';
    }

    public function create(): void
    {
        if (!empty($_POST)) {
            $countryName = htmlspecialchars(trim($_POST['country_name']));

            if (!empty($countryName)) {
                $this->model->create($countryName, 'name');
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

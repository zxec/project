<?php

class SportController extends Controller
{

    public function __construct()
    {
        $this->model = new SportModel();
        $this->view = new View();
        $this->nameView = 'sport_view.tpl';
    }

    public function create(): void
    {
        if (!empty($_POST)) {
            $sportName = htmlspecialchars(trim($_POST['sport_name']));

            if (!empty($sportName)) {
                $this->model->create($sportName, 'name');
            }
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function destroy(): void
    {
        if (!empty($_POST)) {
            $id = $_POST['sport_id'];
            $this->model->delete($id);
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

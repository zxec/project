<?php

class AthleteController extends Controller
{

    public function __construct()
    {
        $this->model = new AthleteModel();
        $this->view = new View();
        $this->nameView = 'athlete_view.tpl';
    }

    public function create(): void
    {
        if (!empty($_POST)) {
            $athleteName = htmlspecialchars(trim($_POST['athlete_name']));

            if (!empty($athleteName)) {
                $this->model->create($athleteName, 'name');
            }
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function destroy(): void
    {
        if (!empty($_POST)) {
            $id = $_POST['athlete_id'];
            $this->model->delete($id);
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

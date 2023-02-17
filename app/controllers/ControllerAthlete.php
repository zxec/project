<?php

class ControllerAthlete extends Controller
{

    public function __construct()
    {
        $this->model = new ModelAthlete();
        $this->view = new View();
        $this->nameView = 'athlete_view.php';
    }

    public function create(): void
    {
        if (!empty($_POST)) {
            $athleteName = htmlspecialchars(trim($_POST['athlete_name']));

            if (!empty($athleteName)) {
                $this->model->create($athleteName);
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
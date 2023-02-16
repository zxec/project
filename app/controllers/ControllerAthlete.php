<?php

class ControllerAthlete extends Controller
{
    public function __construct()
    {
        $this->model = new ModelAthlete();
        $this->view = new View();
    }

    public function index(): void
    {
        $data = $this->model->getData();
        $this->view->generate('athlete_view.php', $data);
    }

    public function create(): void
    {
        if (!empty($_POST)) {
            $athleteName = trim(htmlspecialchars($_POST['athlete_name']));

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
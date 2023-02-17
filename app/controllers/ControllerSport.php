<?php

class ControllerSport extends Controller
{
    public function __construct()
    {
        $this->model = new ModelSport();
        $this->view = new View();
    }

    public function index(): void
    {
        $data = $this->model->getData();
        $this->view->generate('sport_view.php', $data);
    }

    public function create(): void
    {
        if (!empty($_POST)) {
            $sportName = htmlspecialchars(trim($_POST['sport_name']));

            if (!empty($sportName)) {
                $this->model->create($sportName);
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
<?php

class ControllerMedal extends Controller
{
    public function __construct()
    {
        $this->model = new ModelMedal();
        $this->view = new View();
    }

    public function index(): void
    {
        $data = $this->model->getData();
        $this->view->generate('medal_view.php', $data);
    }

    public function create(): void
    {
        if (!empty($_POST)) {
            $medalType = htmlspecialchars(trim($_POST['medal_type']));
            $countryId = htmlspecialchars(trim($_POST['country_id']));
            $sportId = htmlspecialchars(trim($_POST['sport_id']));
            $athletes[] = htmlspecialchars(trim($_POST['athlete_id1'])) ?: null;
            $athletes[] = htmlspecialchars(trim($_POST['athlete_id2'])) ?: null;
            $athletes[] = htmlspecialchars(trim($_POST['athlete_id3'])) ?: null;
            $athletes[] = htmlspecialchars(trim($_POST['athlete_id4'])) ?: null;
            $athletes[] = htmlspecialchars(trim($_POST['athlete_id5'])) ?: null;

            $athletes = array_unique($athletes);

            $this->model->create($medalType, $countryId, $sportId, $athletes);
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function destroy(): void
    {
        if (!empty($_POST)) {
            $id = $_POST['medal_id'];
            $this->model->delete($id);
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
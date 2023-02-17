<?php
include 'app/models/ModelCountry.php';
include 'app/models/ModelMedalType.php';

class ControllerCountryMedal extends Controller
{

    function __construct()
    {
        $this->model = new ModelCountryMedal();
        $this->view = new View();
        $this->nameView = 'countryMedal_view.php';
    }

    public function index($params = null): void
    {
        $modelCountry = new ModelCountry();
        $modelMedalType = new ModelMedalType();

        $data = $this->model->getData($params);

        $country = $modelCountry->getDataCountry($params[0]);
        $medalTypes = $modelMedalType->getData();

        $title = 'Все медали страны ' . $country[0]['country_name'];
        foreach ($medalTypes as $type) {
            if (isset($params[1]) && $params[1] === $type['id']) {
                $title = substr_replace($type['medal_type'], 'ые', -4) . ' медали страны ' . $country[0]['country_name'];
            }
        }

        $this->view->generate($this->nameView, $data, $title);
    }
}
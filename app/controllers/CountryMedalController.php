<?php
include 'app/models/CountryModel.php';
include 'app/models/TypeMedalModel.php';

class CountryMedalController extends Controller
{

    function __construct()
    {
        $this->model = new CountryMedalModel();
        $this->view = new View();
        $this->nameView = 'countryMedal_view.tpl';
    }

    public function index($params = null): void
    {
        $modelCountry = new CountryModel();
        $modelMedalType = new TypeMedalModel();

        $data = $this->model->getData($params);

        $country = $modelCountry->getDataOne($params[0]);
        $medalTypes = $modelMedalType->getData();

        $title = 'Все медали страны ' . $country['name'];
        foreach ($medalTypes as $type) {
            if (isset($params[1]) && $params[1] === $type['id']) {
                $title = substr_replace($type['name'], 'ые', -4) . ' медали страны ' . $country['name'];
            }
        }

        $this->view->generate($this->nameView, $data, $title);
    }
}

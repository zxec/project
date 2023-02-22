<?php
$this->assign('h1', 'Спортсмены');
$this->display('header.tpl');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <?php
                $this->assign([
                    'title' => 'ФИО спортсмена',
                    'url' => '/Athlete/create',
                    'placeholder' => 'Введите ФИО спортсмена',
                    'inputName' => 'athlete_name'
                ]);
                $this->display('formAdd.tpl');

                $this->assign([
                    'thead' => ['id', 'ФИО спортсмена'],
                    'data' => $data,
                    'url' => '/Athlete/destroy',
                    'inputName' => 'athlete_id'
                ]);
                $this->display('table.tpl');
                ?>
            </div>
        </div>
    </div>
</section>
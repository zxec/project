<?php
$this->assign('h1', 'Виды спорта');
$this->display('header.tpl');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <?php
                $this->assign([
                    'title' => 'Вид спорта',
                    'url' => '/Sport/create',
                    'placeholder' => 'Введите название вида спорта',
                    'inputName' => 'sport_name'
                ]);
                $this->display('formAdd.tpl');

                $this->assign([
                    'thead' => ['id', 'Вид спорта'],
                    'data' => $data,
                    'url' => '/Sport/destroy',
                    'inputName' => 'sport_id'
                ]);
                $this->display('table.tpl');
                ?>
            </div>
        </div>
    </div>
</section>
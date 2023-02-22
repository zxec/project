<?php
$this->assign('h1', 'Страны');
$this->display('header.tpl');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <?php
                $this->assign([
                    'title' => 'Название страны',
                    'url' => '/Country/create',
                    'placeholder' => 'Введите название страны',
                    'inputName' => 'country_name'
                ]);
                $this->display('formAdd.tpl');

                $this->assign([
                    'thead' => ['id', 'Страна'],
                    'data' => $data,
                    'url' => '/Country/destroy',
                    'inputName' => 'country_id'
                ]);
                $this->display('table.tpl');
                ?>
            </div>
        </div>
    </div>
</section>
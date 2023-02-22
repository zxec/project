<?php
$this->assign('h1', 'Медали');
$this->display('header.tpl');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php
                $this->assign([
                    'data' => $data,
                    'url' => '/Medal/create'
                ]);
                $this->display('formSelectAdd.tpl');

                $this->assign([
                    'thead' => ['id', 'Страна', 'Тип медали', 'Вид спорта', 'ФИО'],
                    'data' => $data['medals'],
                    'url' => '/Medal/destroy',
                    'inputName' => 'medal_id'
                ]);
                $this->display('table.tpl');
                ?>
            </div>
        </div>
    </div>
</section>
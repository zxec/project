<?php
$this->assign('h1', $params[0]);
$this->display('header.tpl');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php
                $this->assign([
                    'thead' => ['Тип медали', 'Вид спорта', 'ФИО'],
                    'data' => $data
                ]);
                $this->display('table.tpl');
                ?>
            </div>
        </div>
    </div>
</section>
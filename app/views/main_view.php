<?php
$this->assign('h1', 'Главная страница');
$this->display('header.tpl');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <?php
                        $this->assign([
                            'thead' => [
                                isset($params[0]) ? $this->generateSortLink('Место', 'place_desc', 'place_asc', $params[0]) : $this->generateSortLink('Место', 'place_desc', 'place_asc'),
                                isset($params[0]) ? $this->generateSortLink('Страна', 'country_name_desc', 'country_name_asc', $params[0]) : $this->generateSortLink('Страна', 'country_name_desc', 'country_name_asc'),
                                isset($params[0]) ? $this->generateSortLink('Золотые медали', 'g_desc', 'g_asc', $params[0]) : $this->generateSortLink('Золотые медали', 'g_desc', 'g_asc'),
                                isset($params[0]) ? $this->generateSortLink('Серебряные медали', 'a_desc', 'a_asc', $params[0]) : $this->generateSortLink('Серебряные медали', 'a_desc', 'a_asc'),
                                isset($params[0]) ? $this->generateSortLink('Бронзовые медали', 'b_desc', 'b_asc', $params[0]) : $this->generateSortLink('Бронзовые медали', 'b_desc', 'b_asc'),
                                isset($params[0]) ? $this->generateSortLink('Сумма медалей', 'all_desc', 'all_asc', $params[0]) : $this->generateSortLink('Сумма медалей', 'all_desc', 'all_asc')
                            ],
                            'data' => $data
                        ]);
                        $this->display('mainTable.tpl');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
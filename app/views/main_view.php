<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Главная страница</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-10 col-xl-8">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th><?= isset($params[0]) ? $this->generateSortLink('Место', 'place_desc', 'place_asc', $params[0]) : $this->generateSortLink('Место', 'place_desc', 'place_asc') ?></th>
                                        <th><?= isset($params[0]) ? $this->generateSortLink('Страна', 'country_name_desc', 'country_name_asc', $params[0]) : $this->generateSortLink('Страна', 'country_name_desc', 'country_name_asc') ?></th>
                                        <th><?= isset($params[0]) ? $this->generateSortLink('Золотые медали', 'g_desc', 'g_asc', $params[0]) : $this->generateSortLink('Золотые медали', 'g_desc', 'g_asc') ?></th>
                                        <th><?= isset($params[0]) ? $this->generateSortLink('Серебряные медали', 'a_desc', 'a_asc', $params[0]) : $this->generateSortLink('Серебряные медали', 'a_desc', 'a_asc') ?></th>
                                        <th><?= isset($params[0]) ? $this->generateSortLink('Бронзовые медали', 'b_desc', 'b_asc', $params[0]) : $this->generateSortLink('Бронзовые медали', 'b_desc', 'b_asc') ?></th>
                                        <th><?= isset($params[0]) ? $this->generateSortLink('Сумма медалей', 'al_desc', 'al_asc', $params[0]) : $this->generateSortLink('Сумма медалей', 'al_desc', 'al_asc') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($data as $key => $row) { ?>
                                        <tr>
                                            <td><?= $row['place'] ?></td>
                                            <td><?= $row['country_name'] ?></td>
                                            <td>
                                                <a href="/CountryMedal/index/<?= $row['country_id'] . '/' . $row['g_type'] ?>"><?= $row['g'] ?></a>
                                            </td>
                                            <td>
                                                <a href="/CountryMedal/index/<?= $row['country_id'] . '/' . $row['a_type'] ?>"><?= $row['a'] ?></a>
                                            </td>
                                            <td>
                                                <a href="/CountryMedal/index/<?= $row['country_id'] . '/' . $row['b_type'] ?>"><?= $row['b'] ?></a>
                                            </td>
                                            <td>
                                                <a href="/CountryMedal/index/<?= $row['country_id'] ?>"><?= $row['al'] ?></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</div>
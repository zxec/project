<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $params[0] ?></h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-10">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Тип медали</th>
                                    <th>Вид спорта</th>
                                    <th>ФИО1</th>
                                    <th>ФИО2</th>
                                    <th>ФИО3</th>
                                    <th>ФИО4</th>
                                    <th>ФИО5</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($data as $key => $medal) { ?>
                                    <tr>
                                        <td><?= $medal['medal_type'] ?></td>
                                        <td><?= $medal['sport_name'] ?></td>
                                        <td><?= $medal['athlete_name1'] ?></td>
                                        <td><?= $medal['athlete_name2'] ?></td>
                                        <td><?= $medal['athlete_name3'] ?></td>
                                        <td><?= $medal['athlete_name4'] ?></td>
                                        <td><?= $medal['athlete_name5'] ?></td>
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
</div>
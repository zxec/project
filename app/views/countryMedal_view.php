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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Тип медали</th>
                                        <th>Вид спорта</th>
                                        <th>ФИО</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $medal) { ?>
                                        <tr>
                                            <td><?= $medal['medal_type'] ?></td>
                                            <td><?= $medal['sport_name'] ?></td>
                                            <td><?= $medal['athlete_name'] ?></td>
                                            <!-- <?php foreach ($medal['athletes_name'] as $athlete) { ?>
                                                <td><?= $athlete['athlete_name'] ?></td>
                                            <?php } ?> -->
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
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Медали</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form class="" action="/Medal/create" method="POST">
                        <div class="form-group col-6">
                            <div class="form-group w-50">
                                <label>Тип медали</label>
                                <select class="form-control mb-3" name="medal_type" required>
                                    <?php foreach ($data['medal_types'] as $key => $medalType) { ?>
                                        <option value="<?= $medalType['id'] ?>"><?= $medalType['medal_type'] ?></option>
                                    <?php } ?>
                                </select>
                                <label>Страна</label>
                                <select class="form-control mb-3" name="country_id" required>
                                    <?php foreach ($data['countries'] as $key => $country) { ?>
                                        <option value="<?= $country['id'] ?>"><?= $country['country_name'] ?></option>
                                    <?php } ?>
                                </select>
                                <label>Вид спорта</label>
                                <select class="form-control mb-3" name="sport_id" required>
                                    <?php foreach ($data['sports'] as $key => $country) { ?>
                                        <option value="<?= $country['id'] ?>"><?= $country['sport_name'] ?></option>
                                    <?php } ?>
                                </select>
                                <label>Спортсмен1</label>
                                <select class="form-control mb-3" name="athlete_id1" required>
                                    <?php foreach ($data['athletes'] as $key => $country) { ?>
                                        <option value="<?= $country['id'] ?>"><?= $country['athlete_name'] ?></option>
                                    <?php } ?>
                                </select>
                                <label>Спортсмен2</label>
                                <select class="form-control mb-3" name="athlete_id2">
                                    <option value="" selected>---</option>
                                    <?php foreach ($data['athletes'] as $key => $country) { ?>
                                        <option value="<?= $country['id'] ?>"><?= $country['athlete_name'] ?></option>
                                    <?php } ?>
                                </select>
                                <label>Спортсмен3</label>
                                <select class="form-control mb-3" name="athlete_id3">
                                    <option value="" selected>---</option>
                                    <?php foreach ($data['athletes'] as $key => $country) { ?>
                                        <option value="<?= $country['id'] ?>"><?= $country['athlete_name'] ?></option>
                                    <?php } ?>
                                </select>
                                <label>Спортсмен4</label>
                                <select class="form-control mb-3" name="athlete_id4">
                                    <option value="" selected>---</option>
                                    <?php foreach ($data['athletes'] as $key => $country) { ?>
                                        <option value="<?= $country['id'] ?>"><?= $country['athlete_name'] ?></option>
                                    <?php } ?>
                                </select>
                                <label>Спортсмен5</label>
                                <select class="form-control mb-3" name="athlete_id5">
                                    <option value="" selected>---</option>
                                    <?php foreach ($data['athletes'] as $key => $country) { ?>
                                        <option value="<?= $country['id'] ?>"><?= $country['athlete_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-3">
                            <input type="submit" name="add" class="btn btn-primary col-4" value="Добавить">
                        </div>
                    </form>
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Страна</th>
                                        <th>Тип медали</th>
                                        <th>Вид спорта</th>
                                        <th>ФИО</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['medals'] as $key => $medal) { ?>
                                        <tr>
                                            <td><?= $medal['id'] ?></td>
                                            <td><?= $medal['country_name'] ?></td>
                                            <td><?= $medal['medal_type'] ?></td>
                                            <td><?= $medal['sport_name'] ?></td>
                                            <td><?= $medal['athlete_name'] ?></td>
                                            <!-- <td><?= $medal['athlete_name2'] ?></td>
                                        <td><?= $medal['athlete_name3'] ?></td>
                                        <td><?= $medal['athlete_name4'] ?></td>
                                        <td><?= $medal['athlete_name5'] ?></td> -->
                                            <td>
                                                <form action="/Medal/destroy" method="POST">
                                                    <button class="border-0 bg-transparent" name="delete" type="submit">
                                                        <i class="text-danger fas fa-solid fa-trash"></i>
                                                        <input type="hidden" name="medal_id" value="<?= $medal['id'] ?>">
                                                    </button>
                                                </form>
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
</div>
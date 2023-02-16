<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Виды спорта</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <form class="" action="/Sport/create" method="POST">
                        <div class="form-group w-50">
                            <label for="inputTitle">Вид спорта</label>
                            <input name="sport_name" type="text" class="form-control" id="inputTitle"
                                   placeholder="Введите название вида спорта" value="">
                        </div>
                        <div class="form-group w-50">
                            <input type="submit" name="add" class="btn btn-primary col-4" value="Добавить">
                        </div>
                    </form>
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Вид спорта</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($data as $key => $sport) { ?>
                                    <tr>
                                        <td><?= $sport['id'] ?></td>
                                        <td><?= $sport['sport_name'] ?></td>
                                        <td>
                                            <form action="/Sport/destroy" method="POST">
                                                <button class="border-0 bg-transparent" name="delete" type="submit">
                                                    <i class="text-danger fas fa-solid fa-trash"></i>
                                                    <input type="hidden" name="sport_id" value="<?= $sport['id'] ?>">
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
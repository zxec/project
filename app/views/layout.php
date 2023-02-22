<!DOCTYPE html>
<html lang="ru">
<?php
$this->assign('title', 'Competitions');
$this->display('head.tpl');
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php
        $this->assign('rows', [
            ['url' => '/', 'title' => 'Главная страница'],
            ['url' => '/Country', 'title' => 'Добавить страну'],
            ['url' => '/Medal', 'title' => 'Добавить медаль'],
            ['url' => '/Sport', 'title' => 'Добавить вид спорта'],
            ['url' => '/Athlete', 'title' => 'Добавить спортсмена'],
        ]);
        $this->display('sideBar.tpl');
        ?>
        <div class="content-wrapper">
            <?php include 'app/views/' . $contentView; ?>
        </div>
    </div>
    <script src="/resources/plugins/jquery/jquery.min.js"></script>
    <script src="/resources/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="/resources/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/resources/plugins/moment/moment.min.js"></script>
    <script src="/resources/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="/resources/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="/resources/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="/resources/dist/js/adminlte.js"></script>
    <script src="/resources/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script src="/resources/plugins/select2/js/select2.full.min.js"></script>
</body>

</html>
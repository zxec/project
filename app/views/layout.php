<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Competitions</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/resources/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/resources/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/resources/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/resources/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/resources/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/resources/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <div class="sidebar">
            <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        <p>
                            Главная страница
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/Country" class="nav-link">
                        <p>
                            Добавить страну
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/Medal" class="nav-link">
                        <p>
                            Добавить медаль
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/Sport" class="nav-link">
                        <p>
                            Добавить вид спорта
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/Athlete" class="nav-link">
                        <p>
                            Добавить спортсмена
                        </p>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <?php include 'app/views/' . $contentView; ?>
    <footer class="main-footer">
        <strong></strong>
    </footer>
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

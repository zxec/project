{include file='header.tpl' h1='Главная страница'}
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        {include file='mainTable.tpl' thead = $sortLink}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
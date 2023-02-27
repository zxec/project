{include file='header.tpl' h1='Страны'}
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                {include file='formAdd.tpl' title='Название страны' url = '/Country/create' placeholder = 'Введите название страны' inputName = 'country_name'}
                {include file='table.tpl' thead = ['id', 'Страна'] url = '/Country/destroy' inputName = 'country_id'}
            </div>
        </div>
    </div>
</section>
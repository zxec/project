{include file='header.tpl' h1='Виды спорта'}
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                {include file='formAdd.tpl' title='Виды спорта' url = '/Sport/create' placeholder = 'Введите название вида спорта' inputName = 'sport_name'}
                {include file='table.tpl' thead = ['id', 'Вид спорта'] url = '/Sport/destroy' inputName = 'sport_id'}
            </div>
        </div>
    </div>
</section>
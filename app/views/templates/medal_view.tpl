{include file='header.tpl' h1='Медали'}
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                {include file='formSelectMedal.tpl' url = '/Medal/create'}
                {include file='table.tpl' thead = ['id', 'Страна', 'Тип медали', 'Вид спорта', 'ФИО'] url = '/Medal/destroy' inputName = 'medal_id' data = $data['medals']}
            </div>
        </div>
    </div>
</section>
{include file='header.tpl' h1='Спортсмены'}
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                {include file='formAdd.tpl' title='ФИО спортсмена' url = '/Athlete/create' placeholder = 'Введите ФИО спортсмена' inputName = 'athlete_name'}
                {include file='table.tpl' thead = ['id', 'ФИО спортсмена'] url = '/Athlete/destroy' inputName = 'athlete_id'}
            </div>
        </div>
    </div>
</section>
<form class="" action="{$url}" method="POST">
    <div class="form-group col-6">
        <div class="form-group w-50">
            <label>Тип медали</label>
            <select class="form-control mb-3" name="medal_type" required>
                {foreach $data['medal_types'] as $row}
                    <option value="{$row['id']}">{$row['medal_type']}</option>
                {/foreach}
            </select>
            <label>Страна</label>
            <select class="form-control mb-3" name="country_id" required>
                {foreach $data['countries'] as $row}
                    <option value="{$row['id']}">{$row['country_name']}</option>
                {/foreach}
            </select>
            <label>Вид спорта</label>
            <select class="form-control mb-3" name="sport_id" required>
                {foreach $data['sports'] as $row}
                    <option value="{$row['id']}">{$row['sport_name']}</option>
                {/foreach}
            </select>
                <label>Спортсмен1</label>
                <select class="form-control mb-3" name="athlete_id1" required>
                <option value="" selected>---</option>
                {foreach $data['athletes'] as $row}
                    <option value="{$row['id']}">{$row['athlete_name']}</option>
                {/foreach}
            </select>
            </select>
                <label>Спортсме2</label>
                <select class="form-control mb-3" name="athlete_id2" required>
                <option value="" selected>---</option>
                {foreach $data['athletes'] as $row}
                    <option value="{$row['id']}">{$row['athlete_name']}</option>
                {/foreach}
            </select>
            </select>
                <label>Спортсмен3</label>
                <select class="form-control mb-3" name="athlete_id3" required>
                <option value="" selected>---</option>
                {foreach $data['athletes'] as $row}
                    <option value="{$row['id']}">{$row['athlete_name']}</option>
                {/foreach}
            </select>
            </select>
                <label>Спортсмен4</label>
                <select class="form-control mb-3" name="athlete_id4" required>
                <option value="" selected>---</option>
                {foreach $data['athletes'] as $row}
                    <option value="{$row['id']}">{$row['athlete_name']}</option>
                {/foreach}
            </select>
            </select>
                <label>Спортсмен5</label>
                <select class="form-control mb-3" name="athlete_id5" required>
                <option value="" selected>---</option>
                {foreach $data['athletes'] as $row}
                    <option value="{$row['id']}">{$row['athlete_name']}</option>
                {/foreach}
            </select>
        </div>
    </div>
    <div class="form-group col-3">
        <input type="submit" name="add" class="btn btn-primary col-4" value="Добавить">
    </div>
</form>
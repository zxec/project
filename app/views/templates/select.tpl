{foreach $data as $row}
    <label>Спортсмен</label>
    <select class="form-control mb-3" name="athlete_id1" required>
    <?php foreach ($data['athletes'] as $row) { ?>
        <option value="<?= $row['id'] ?>"><?= $row['athlete_name'] ?></option>
    <?php } ?>
    </select>
{/foreach}
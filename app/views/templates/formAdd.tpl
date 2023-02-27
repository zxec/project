<form action="{$url}" method="POST">
    <div class="form-group w-50">
        <label for="inputTitle">{$title}</label>
        <input name="{$inputName}" type="text" class="form-control" id="inputTitle" placeholder="{$placeholder}">
    </div>
    <div class="form-group w-50">
        <input type="submit" name="add" class="btn btn-primary col-4" value="Добавить">
    </div>
</form>
<form action="{$url}" method="POST">
    <button class="border-0 bg-transparent" name="delete" type="submit">
        <i class="text-danger fas fa-solid fa-trash"></i>
        <input type="hidden" name="{$inputName}" value="{$row['id']}">
    </button>
</form>
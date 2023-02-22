<div class="card">
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    {foreach $thead as $row}
                        <th>{$row}</th>
                    {/foreach}  
                </tr>
            </thead>
            <tbody>
                {foreach $data as $row}
                    <tr>
                        {foreach $row as $col}
                            <td>{$col}</td>
                        {/foreach}
                        {if isset($inputName)} 
                            <td>
                                {include file='formDelete.tpl'}
                            </td>
                        {/if}
                    </tr>
                {/foreach}  
            </tbody>
        </table>
    </div>
</div>
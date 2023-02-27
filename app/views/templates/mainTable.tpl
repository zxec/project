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
                <td>{$row['place']}</td>
                <td>{$row['country_name']}</td>
                <td>
                    <a href="/CountryMedal/index/{$row['country_id']}/1">{$row['g']}</a>
                </td>
                <td>
                    <a href="/CountryMedal/index/{$row['country_id']}/2">{$row['a']}</a>
                </td>
                <td>
                    <a href="/CountryMedal/index/{$row['country_id']}/3">{$row['b']}</a>
                </td>
                <td>
                    <a href="/CountryMedal/index/{$row['country_id']}">{$row['all']}</a>
                </td>
            </tr>
        {/foreach}
    </tbody>
</table>
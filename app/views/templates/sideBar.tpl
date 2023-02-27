<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            {foreach $rows as $row}
                <li class="nav-item">
                    <a href="{$row['url']}" class="nav-link">
                        <p>
                            {$row['title']}
                        </p>
                    </a>
                </li>
            {/foreach}  
        </ul>
    </div>
</aside>
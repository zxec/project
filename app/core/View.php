<?php

class View extends SmartyGuestBook
{
    public string $templateView = 'layout.tpl';

    public function generateSortLink($title, $a, $b, $sort = null): string
    {
        if ($sort == $a) {
            return '<a class="active" href="/Main/sort/' . $b . '">' . $title . ' <i class="fas fa-solid fa-sort-down"></i></a>';
        } elseif ($sort == $b) {
            return '<a class="active" href="/Main/sort/' . $a . '">' . $title . ' <i class="fas fa-solid fa-sort-up"></i></a>';
        } else {
            return '<a href="/Main/sort/' . $a . '">' . $title . '</a>';
        }
    }

    public function generate($contentView, $data = null, ...$params): void
    {
        $sortLink = [
            isset($params[0]) ? $this->generateSortLink('Место', 'place_desc', 'place_asc', $params[0]) : $this->generateSortLink('Место', 'place_desc', 'place_asc'),
            isset($params[0]) ? $this->generateSortLink('Страна', 'country_name_desc', 'country_name_asc', $params[0]) : $this->generateSortLink('Страна', 'country_name_desc', 'country_name_asc'),
            isset($params[0]) ? $this->generateSortLink('Золотые медали', 'g_desc', 'g_asc', $params[0]) : $this->generateSortLink('Золотые медали', 'g_desc', 'g_asc'),
            isset($params[0]) ? $this->generateSortLink('Серебряные медали', 'a_desc', 'a_asc', $params[0]) : $this->generateSortLink('Серебряные медали', 'a_desc', 'a_asc'),
            isset($params[0]) ? $this->generateSortLink('Бронзовые медали', 'b_desc', 'b_asc', $params[0]) : $this->generateSortLink('Бронзовые медали', 'b_desc', 'b_asc'),
            isset($params[0]) ? $this->generateSortLink('Сумма медалей', 'all_desc', 'all_asc', $params[0]) : $this->generateSortLink('Сумма медалей', 'all_desc', 'all_asc')
        ];

        $this->assign(['data' => $data, 'sortLink' => $sortLink, 'contentView' => $contentView, 'params' => $params]);
        $this->display($this->templateView);
    }
}

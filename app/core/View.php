<?php

class View
{
    public string $templateView = 'layout.php';

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
        include 'app/views/' . $this->templateView;
    }
}

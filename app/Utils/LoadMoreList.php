<?php


namespace App\Utils;


class LoadMoreList
{
    public static function loadMoreList($query, $page, $per = 9)
    {
        if (!$page) {
            $page = 1;
        } else {
            $page = intval($page);
        }

        $number = $per * $page;
        $list = $query->limit($number)->get();
        if (count($list) < $number) {
            $noMore = true;
        }
        $page++;

        return collect(compact('list', 'page', 'noMore'));
    }
}
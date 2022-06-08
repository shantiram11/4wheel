<?php

if (!function_exists('p')) {
    function p($r)
    {
        echo '<pre>';
        print_r($r);
        echo '</pre>';
    }
}


if (!function_exists('pe')) {
    function pe($r)
    {
        echo '<pre>';
        print_r($r);
        echo '</pre>';
        exit();
    }
}

/**
 * This function is used in sidebar to determine the active page
 */
if (!function_exists('current_page')) {
    function current_page($active = '/')
    {
        $current = request()->segment(2);
        if (is_array($active)) {
            foreach ($active as $ak => $av) {
                if (!strcasecmp($current, $av)) {
                    return true;
                    break;
                };
            }
        } else {
            return !strcasecmp($current, $active);
        }
        return false;
    }
}

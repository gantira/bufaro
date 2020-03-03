<?php

function linkActive($link, $array)
{
    return in_array($link, $array) ? 'active' : '';
}

function linkMenuActive($link, $array)
{
    return in_array($link, $array) ? 'menu-open' : '';
}

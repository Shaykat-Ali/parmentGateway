<?php

function menu_open_if_match($path)
{
    return Request::is($path . '*') ? 'menu-open' : '';
}

function menu_open_if_full_match($path)
{
    return Request::is($path) ? 'menu-open' : '';
}

function active_if_match($path)
{
    return Request::is($path . '*') ? 'active' : '';
}

function active_if_full_match($path)
{
    return Request::is($path) ? 'active' : '';
}

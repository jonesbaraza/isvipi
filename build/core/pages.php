<?php
    /****************************************************************************
     *   Copyright (C) 2022 https://isvipi.com

        This program is free software; you can redistribute it and/or modify
        it under the terms of the GNU General Public License as published by
        the Free Software Foundation Version 3 of the License, or
        (at your option) any later version.

        This program is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
        GNU General Public License for more details.

        You should have received a copy of the GNU General Public License along
        with this program; if not, write to the Free Software Foundation, Inc.,
        51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
    *****************************************************************************/ 
    require_once(ICE_CORE .'classes/class.pages.php');
    global $pages;

    $pages = new pages();

    $requestedFile = ICE_THEMES . THEME .'/'.preg_replace('/[^\w]/','',$PAGE[0]).'.php';

    if($PAGE[0] === 'do' && isset($PAGE[1]) && is_file(ICE_PROCESS . 'process.' . $page[1] . '.php')){
        require_once(ICE_PROCESS . 'process.' . $page[1] . '.php');
    } else if($PAGE[0] === 'runcrons'){
        require_once(ICE_CLASSES . 'global/class.cronjobs.php');
    } else if(is_file($requestedFile)){
        $pages->load_page($PAGE);
    } else {
        $pages->page_not_found();
    }
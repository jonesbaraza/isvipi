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
    require_once(ICE_BUILD . 'database/db.php');
    global $db;
    
    /*
    * establish the database connection
    */
    
    try {
        $db = new MysqliDb (Array (
            'host' => DB_HOST,
            'username' => DB_USER, 
            'password' => DB_PASSWORD,
            'db'=> DB_NAME,
            'port' => 3306,
            'prefix' => DB_PREFIX,
            'charset' => DB_CHARSET)
        );
    } catch(Exception $e) {
        echo $e->getMessage();
        exit();
    }
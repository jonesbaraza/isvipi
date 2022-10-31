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
    ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    require_once ICE_CORE .'functions/function.core.php';

    $url = clean_post('site');              $_SESSION['ins']['url'] = $url;
    $title = clean_post('stitle');          $_SESSION['ins']['stitle'] = $title;
    $email = clean_post('semail');          $_SESSION['ins']['semail'] = $email;
    $stype = clean_post('stype');           $_SESSION['ins']['stype'] = $stype;
    $dbname = clean_post('dbname');         $_SESSION['ins']['dbname'] = $dbname;
    $dbuser = clean_post('dbuser');         $_SESSION['ins']['dbuser'] = $dbuser;
    $dbpwd = clean_post('dbpwd');           $_SESSION['ins']['dbpwd'] = $dbpwd;
    $dbhost = clean_post('dbhost');         $_SESSION['ins']['dbhost'] = $dbhost;
    $admfname = clean_post('admfname');     $_SESSION['ins']['admfname'] = $admfname;
    $admlname = clean_post('admlname');     $_SESSION['ins']['admlname'] = $admlname;
    $admemail = clean_post('admemail');     $_SESSION['ins']['admemail'] = $admemail;
    $admpwd = clean_post('admpwd');         $_SESSION['ins']['admpwd'] = $admpwd;
    
    //test the database details
    try {
        $db = mysqli_connect($dbhost, $dbuser, $dbpwd, $dbname);

        /*
        * import the respective sql file
        */
        if($stype === 2){
            $sqlfile = ICE_BUILD . 'installer/sql/dating.sql';
        } else {
            $sqlfile = ICE_BUILD . 'installer/sql/sn.sql';
        }

        $sql = '';
        $sqllines = file($sqlfile);

        foreach ($sqllines as $line){
            if (substr($line, 0, 2) == '--' || $line == '')
                continue;

            $sql .= $line;
            if (substr(trim($line), -1, 1) == ';'){
                mysqli_query($db, $sql) or print('Error performing query \'<strong>' . $sql . '\': ' . mysql_error() . '<br /><br />');
                $sql = '';
            }
        }

        /*
        * add the new configurations
        */



        /*
        * add the new admin
        */


        /*
        * generate temp.config.php
        */
        

    } catch (Exception $e){
        $_SESSION['error'] = $e->getMessage();
    }
    

    

?>
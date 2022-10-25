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
  function clean_post($var){
		$val = @trim($_POST[$var]);
		$val = stripslashes($val);
		return htmlspecialchars($val);
	}

	function clean_get($var){
		$str = strip_tags(trim($var));
		return preg_replace("/[^A-Za-z0-9 ]/", '', $str);
	}

	function _safe($str){
		$str = htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
		$str = html_entity_decode($str);
		return $str;
	}

  function error_404(){
    global $ice, $converter;
    echo "Not Found"; exit();
  }

  function forbidden_page(){
    header('HTTP/1.0 403 Forbidden');
		die('<h2>Access Denied!</h2>');
		exit();
  }
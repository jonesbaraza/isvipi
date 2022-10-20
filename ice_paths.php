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
    
	//@_Base Paths
	$chop = -strlen(basename($_SERVER['SCRIPT_NAME']));
	define('ICE_ROOT',substr($_SERVER['SCRIPT_FILENAME'],0,$chop));
	define('ICE_URL',substr($_SERVER['SCRIPT_NAME'],0,$chop));
	
	//@_Directories
	define('ICE_BUILD', ICE_ROOT . 'build' . DIRECTORY_SEPARATOR);
	define('ICE_CORE', ICE_BUILD . 'core' . DIRECTORY_SEPARATOR);
	define('ICE_CONTROLLERS', ICE_BUILD . 'controllers' . DIRECTORY_SEPARATOR);
	define('ICE_CRON', ICE_BUILD . 'cron' . DIRECTORY_SEPARATOR);
	define('ICE_THEMES', ICE_ROOT . 'themes' . DIRECTORY_SEPARATOR);
	define('ICE_VENDOR', ICE_ROOT . 'vendor' . DIRECTORY_SEPARATOR);
	define('ICE_UPLOADS', ICE_BUILD . 'uploads' . DIRECTORY_SEPARATOR);
	define('ICE_MEDIA', ICE_BUILD . 'media' . DIRECTORY_SEPARATOR);
	define('ICE_PROCESS', ICE_BUILD . 'process' . DIRECTORY_SEPARATOR);
	define('ICE_TEMP', ICE_ROOT . 'temp' . DIRECTORY_SEPARATOR);

	//@_URLs
	define('ICE_BUILD_URL', ICE_URL . 'build' . DIRECTORY_SEPARATOR);
	define('ICE_MEDIA_URL', ICE_BUILD_URL . 'media' . DIRECTORY_SEPARATOR);
	define('ICE_UPLOADS_URL', ICE_BUILD_URL . 'uploads' . DIRECTORY_SEPARATOR);
	define('ICE_VENDOR_URL', ICE_URL . 'vendor' . DIRECTORY_SEPARATOR);
	define('ICE_THEMES_URL', ICE_URL . 'themes' . DIRECTORY_SEPARATOR);
	define('ICE_ACTIONS_URL', ICE_URL . 'do' . DIRECTORY_SEPARATOR);
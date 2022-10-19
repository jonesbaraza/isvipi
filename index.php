<?php
    ob_start();
    session_set_cookie_params(0);
    session_start();
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
    require_once 'ice_paths.php';
	require_once ICE_CORE .'classes/class.core.php';

    //@ice_ : IsVipi Community Engine
	$ice = new core();

    //initialize string encoding/decoding
	$converter = new mukto90\Ncrypt;
    $converter->set_secret_key( SECRET_KEY );
    $converter->set_secret_iv( SECRET_IV );

	//run our application
	$ice->run();

    ob_end_flush();
?>
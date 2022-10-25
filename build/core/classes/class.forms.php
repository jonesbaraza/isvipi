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
    class forms {

        public function _logged_in(){

        }

        public function _forbid_direct_access(){
            if(!isset($_SERVER['HTTP_REFERER'])){
                return true;
            }
        }

        public function _is_demo(){
            if(DEMO_MODE){
                return true;
            }
        }

        public function _nonce_passed($nonce = ''){
            global $ice;

            if(isset($_SESSION['ice_nonce']) && isset($nonce['ice_nonce'])){
                return true;
            }

            if($ice->verify_nonce($nonce['ice_nonce'])){
                return true;
            }
        }

        public function valid_request($params = ''){
            global $converter;

            if(empty($params)){
                return null;
            } else if(isset($params['ice_op']) && !empty($params['ice_op'])){
                return $converter->decrypt($params['ice_op']);
            } else if(isset($params[2]) && !empty($params[2])){
                return $converter->decrypt($params[2]);
            }
            
        }

        
        
    }
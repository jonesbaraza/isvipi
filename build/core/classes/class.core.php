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

    class core {

		public function __construct() {
			//check if ICE is installed
			$this->_installed();

			//include core files
			$this->_core_files();

			//configure our application
			$this->_temp_configurations();
		}

        public function _installed(){
            //if not installed, we start the install process
            if(!is_file(ICE_BUILD . 'database/db.php')){
                require_once(ICE_BUILD .'installer/installer.php');
				exit();
            }
        }

        public function _core_files(){
            require_once ICE_CORE .'functions/function.core.php';
            require_once ICE_VENDOR . 'autoload.php';
            require_once(ICE_BUILD . 'database/database.php');
        }

        public function _temp_configurations(){
			global $db;

            //toggle demo mode
            define("DEMO_MODE", false);

            //toggle display of errors
            define('DEBUGGING', true);

            //user's logged in session 'key' identifier
            define('USER_LOGGED', 'ice_user_id');

			//check if the configurations file exists
			if(is_file(ICE_TEMP ."temp.config.php")){
				require_once ICE_TEMP ."temp.config.php";
			} else {
				$config = "<?php \n";
				$siteConfig = $db->get('configurations');
				
				foreach($siteConfig as $conf){
					$config .= 'define("'.strtoupper($conf['config_name']).'", "'.$conf['config_value'].'");'."\n";
				}
				$config .= "?>";
				
				//create config file
				$configFile = fopen(ICE_TEMP ."temp.config.php", "w") or die("Unable to open file! Please check folder permissions.");
				fwrite($configFile, $config);
				fclose($configFile);

				//once the configuration file has been generated, we reload the page
				header("Refresh:0");
				exit();
			}
        }

        public function runtime_configurations(){

			//if debugging is true then we display server errors
			if(DEBUGGING){
				ini_set('display_errors', 1);
				ini_set('display_startup_errors', 1);
				error_reporting(E_ALL);
			} else {
				error_reporting(0);
			}

            //force the site to load the non-www version
			if (substr($_SERVER['HTTP_HOST'], 0, 4) === 'www.') {
			    header('Location: http'.(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 's':'').'://' . substr($_SERVER['HTTP_HOST'], 4).$_SERVER['REQUEST_URI']);
			    exit;
			}

            //set the site url based on the user's settings
			if(ENABLE_SSL == 1 && $_SERVER["HTTPS"] != "on"){
				define('ICE_URI', SECURE_URL);
				header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
			    exit();
			} else {
				define('ICE_URI', SITE_URL);
			}		

			//set cronjobs
			if(SYSTEM_CRONS){
				require_once(ICE_CORE . 'classes/class.cronjobs.php');
			}
		}

        public function nonce() {
			$this->nonce = bin2hex(random_bytes(5).session_id());
			$_SESSION['ice_nonce'][$this->nonce]['session'][] = session_id();
			$_SESSION['ice_nonce'][$this->nonce]['used'] = false;
			return $this->nonce;
		}

		public function verify_nonce($nonce){
			//check if the session has a record
			if(!in_array($_SESSION['ice_nonce'][$nonce], $_SESSION['ice_nonce'])){
				return false;
			} else {
				//check if the nonce has been used
				if(isset($_SESSION['ice_nonce'][$nonce]['used']) && ($_SESSION['ice_nonce'][$nonce]['used'] == true)){
					return false;
				} else {
					$_SESSION['ice_nonce'][$nonce]['used'] = true;
					return true;
				}
			}
		}

		public function footer_copyright(){
			return "Copyright &copy; ".date('Y')." ".SITE_TITLE.".";
		}

        public function run(){
            global $PAGE;

			//set runtime configurations
			$this->runtime_configurations();
			
			$URL = str_replace(
				array( '\\', '../' ),
				array( '/',  '' ),
				$_SERVER['REQUEST_URI']
			);

			if ($offset = strpos($URL,'?')) {
				// strip getData
				$URL = substr($URL,0,$offset);
			} else if ($offset = strpos($URL,'#')) {
				$URL = substr($URL,0,$offset);
			}

			if (ICE_URL != '/'){
				$URL=substr($URL,strlen(ICE_URL));
			} else {
				$URL = trim($URL,'/');
			}
			
			if (
				file_exists(ICE_ROOT.'/'.$URL) &&
				($_SERVER['SCRIPT_FILENAME'] != ICE_ROOT.$URL) &&
				($URL != '') &&
				($URL != 'index.php')
			) {
				$this->pages->page_not_found();
			}

			$PAGE = (
				($URL == '') ||
				($URL == 'index.php') ||
				($URL == 'index.html')
			) ? array('index') : explode('/',html_entity_decode($URL));

			require_once(ICE_CORE .'pages.php');
			exit();
        }
    }

?>